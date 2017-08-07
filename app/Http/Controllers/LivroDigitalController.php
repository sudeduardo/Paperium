<?php

namespace App\Http\Controllers;

use App\LivroDigital;
use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
use Image;
use Session;
use Auth;

class LivroDigitalController extends Controller
{
    public function cadastraLivro(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required|alpha_num_spaces|max:100|unique:livros_digitais',
            'capa' => 'required|mimes:jpg,jpeg,png|max:2000',
            'arquivo' => 'required|mimes:pdf|max:6500',
            'genero' => 'required|integer|exists:generos,id',
            'autor' => 'required|array|min:1|max:3|exists:autores,id'
        ]);

        $livro = new LivroDigital;

        $livro->nome = $request->input(['nome']);
        $livro->genero_id = $request->input(['genero']);

        if($request->hasFile('capa') && $request->hasFile('arquivo')){
            $img = $request->file('capa');  //atribuo a img a uma var
            $imgNome = md5($img.microtime()).'.'.$img->getClientOriginalExtension(); //faço um nome randomico + extensao
            $localCapa = public_path('img/livro/' . $imgNome);   //local junto com a imagem
            Image::make($img)->resize(250,250)->save($localCapa); //salvo a imagem,ja redimensionada

            $pdf = $request->file('arquivo');
            $pdfNome =  md5($pdf.microtime()).'.'.$pdf->getClientOriginalExtension();
            Storage::disk('pdfLivro')->put($pdfNome ,file_get_contents($pdf->getRealPath()));

            $livro->capa = $imgNome;
            $livro->arquivo = $pdfNome;
        }

        if($livro->save()){
            $livro->autores()->sync($request->input(['autor']), false);
            Session::flash('sucesso','Livro cadastrado com sucesso');
            return redirect()->route('admin::livros.index',['rota' => 'livro']);
        }else{
            return redirect()->back()
                ->withInput();
        }

    }

    public function atualizaLivro($id,Request $request)
    {
        $livro = LivroDigital::query()->findOrFail($id);

        if ($request->input(['nome']) == $livro->nome ){
            $this->validate($request,[
               'capa' => 'sometimes|mimes:jpg,jpeg,png|max:2000',
                'arquivo' => 'sometimes|mimes:pdf|max:6500',
                'genero' => 'required|integer|exists:generos,id',
                'autor' => 'required|array|min:1|max:2|exists:autores,id'
            ]);
        }else{
            $this->validate($request,[
                'nome' => 'required|alpha_num_spaces|max:100|unique:livros_digitais',
                'capa' => 'sometimes|mimes:jpg,jpeg,png|max:2000',
                'arquivo' => 'sometimes|mimes:pdf|max:6500',
                'genero' => 'required|integer|exists:generos,id',
                'autor' => 'required|array|min:1|max:3|exists:autores,id'
            ]);
        }

        $livro->nome = $request->input(['nome']);
        $livro->genero_id = $request->input(['genero']);

        if($request->hasFile('capa')){
            $img = $request->file('capa');  //atribuo a img a uma var
            $imgNome = md5($img.microtime()).'.'.$img->getClientOriginalExtension(); //faço um nome randomico + extensao
            $localCapa = public_path('img/livro/' . $imgNome);   //local junto com a imagem
            Image::make($img)->resize(250,250)->save($localCapa); //salvo a imagem,ja redimensionada

            $imgAntiga = $livro->capa; //pego o nome da img antiga
            if(Storage::disk('imgLivro')->exists($imgAntiga)){
                Storage::disk('imgLivro')->delete($imgAntiga); //deleto a img antiga caso exista
            }

            $livro->capa = $imgNome; //atribuo ao campo o novo nome
        }

        if($request->hasFile('arquivo')){
            $pdf = $request->file('arquivo');
            $pdfNome =  md5($pdf.microtime()).'.'.$pdf->getClientOriginalExtension();
            Storage::disk('pdfLivro')->put($pdfNome ,file_get_contents($pdf->getRealPath()));

            $pdfAntigo = $livro->arquivo; //pego o nome da img antiga
            if(Storage::disk('pdfLivro')->exists($pdfAntigo)){
                Storage::disk('pdfLivro')->delete($pdfAntigo); //deleto a img antiga caso exista
            }

            $livro->arquivo = $pdfNome;
        }

        if($livro->save()){
            $livro->autores()->sync($request->input(['autor']));
            Session::flash('sucesso','Livro atualizado com sucesso');
            return redirect()->route('admin::mostra.livro',$livro->id);
        }else{
            return redirect()->back();
        }

    }

    public function deletaLivro($id)
    {
       $livro = LivroDigital::query()->findOrFail($id);

        if(Storage::disk('pdfLivro')->exists($livro->arquivo)){
            Storage::disk('pdfLivro')->delete($livro->arquivo); //deleto o arquivo caso exista
        }

        if(Storage::disk('imgLivro')->exists($livro->capa)){
            Storage::disk('imgLivro')->delete($livro->capa); //deleto a img  caso exista
        }

        if($livro->delete()){
            Session::flash('sucesso','Livro deletado com sucesso');
            return redirect()->route('admin::livros.index',['rota' => 'livro']);
        }else{
            return redirect()->back();
        }

    }

    public function adicionarLivroLeitura(Request $request)
    {
        if($request->ajax()){
           $this->validate($request,[
               'livroId' => 'required|integer|exists:livros_digitais,id'
           ]);

           $leitor = Auth::user();
           if(!$leitor->livrosDigitais->contains($request->livroId)){
               if($leitor->livrosDigitais()->sync($request->all(),false)){
                   return ['status' => 'sucesso','mensagem' => 'Livro adicionado a lista com sucesso'];
               }
           }else{
               return ['status' => 'erro','mensagem' => 'O livro já está na sua lista de leitura'];
           }
        }
    }
    
    public function removerLivroLeitura(Request $request)
    {
        if($request->ajax()){
           $this->validate($request,[
               'livroId' => 'required|integer|exists:livros_digitais,id'
           ]);

           $leitor = Auth::user();
           if($leitor->livrosDigitais->contains($request->livroId)){
               if($leitor->livrosDigitais()->detach($request->all())){
                   return ['status' => 'sucesso','mensagem' => 'Livro retirado da sua lista com sucesso'];
               }
           }else{
               return ['status' => 'erro','mensagem' => 'O livro não pode ser retirado pois não está na sua lista de leitura'];
           }

        }
    }

    public function atualizarPaginaLeitura($arquivo,$pagina)
    {
        if(Auth::check()){
          $leitor = Auth::user();
          $livro = LivroDigital::where('arquivo',$arquivo)->first();
          if($leitor->livrosDigitais->contains($livro->id)){
              $leitor->livrosDigitais()->updateExistingPivot($livro->id,['pag_atual'=>$pagina]);
          }            
        }
    }

}
