<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Genero;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\LivroDigital;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;
use Image;

class LeitorController extends Controller
{

    public function index()
    {
        $livros = LivroDigital::query()->orderBy('nome')->paginate(8,['*'],'livros');
        $generos = Genero::query()->orderBy('genero')->paginate(2,['*'],'generos');
        $url = \Request::fullUrl();
        if(strpos($url,'generos')){
            $parametro = 'generos';
        }else{
            $parametro = 'livros';
        }
        return view('leitor.index')->with(['livros' => $livros,'generos' => $generos,'parametro' => $parametro]);
    }

    public function acervoFisico()
    {
        return view('leitor.acervoFisico');
    }

    public function mostraPerfil()
    {
        $livros = Auth::user()->livrosDigitais()->orderBy('nome')->paginate(8);
        return view('leitor.perfil')->with(['livros' => $livros]);
    }

    public function downloadLivroDigital($id)
    {
        $livro = LivroDigital::query()->findOrFail($id);
        $localArquivo = public_path('pdf.js/web/pdf/').$livro->arquivo;
        $tipoArquivo =  Storage::disk('pdfLivro')->mimeType($livro->arquivo);
        return response()->download($localArquivo, $livro->arquivo, ['Content-Type' => $tipoArquivo]);
    }

    public function redirecionaPesquisa()
    {
        $pesquisa = Input::get('pesquisa');
        if($pesquisa == ''){
            Session::flash('atencao','Caso deseja realizar uma pesquisa, preencha o campo de pesquisa.');
            return redirect()->back();
        }else{
            return redirect('/pesquisa/'.$pesquisa);
        }
    }

    public function pesquisaGeral($pesquisa)
    {
        $livros = LivroDigital::query()->where('nome','like','%'.$pesquisa.'%')->orderBy('nome')->paginate(8,['*'],'livros');
        $autores = Autor::query()->where('autor','like','%'.$pesquisa.'%')->orderBy('autor')->paginate(30,['*'],'autores');
        $url = \Request::fullUrl();
        if(strpos($url,'autores')){
            $parametro = 'autores';
        }else{
            $parametro = 'livros';
        }
        return view('leitor.pesquisa')->with(['pesquisa' => $pesquisa,'livros' => $livros,'autores' => $autores,'parametro' => $parametro]);
    }

    public function generoLivros($genero)
    {
        $genero = Genero::query()->where('genero',$genero)->first();
        $livros = $genero->livrosDigitais()->orderBy('nome')->paginate(8);
        return view('leitor.livrosGenero')->with(['genero' => $genero,'livros' => $livros]);
    }

    public function autorLivros($autor)
    {
        $autor = Autor::query()->where('autor',$autor)->first();
        $livros = $autor->livrosDigitais()->orderBy('nome')->paginate(8);
        return view('leitor.livrosAutor')->with(['autor' => $autor,'livros' => $livros]);
    }

    public function mudarSenha(Request $request)
    {
        $this->validate($request,[
            'senha' => 'required|min:6|alpha_num|confirmed'
        ]);

        $leitor = Auth::user();
        $leitor->password = bcrypt($request->input(['senha']));
        if($leitor->update()){
            Session::flash('sucesso','Sua senha foi alterada com sucesso');
        }
        return redirect()->back();
    }

    public function mudarFoto(Request $request)
    {
       $this->validate($request,[
           'foto' => 'required|mimes:jpg,jpeg,png|max:2000'
       ]);

       $leitor = Auth::user();

       if($request->hasFile('foto')){
           $img = $request->file('foto');  //atribuo a img a uma var
           $imgNome = $leitor->id.''.md5($img.microtime()).'.'.$img->getClientOriginalExtension(); //faço um nome randomico + extensao
           $localCapa = public_path('img/leitor/' . $imgNome);   //local junto com a imagem
           Image::make($img)->resize(300,300)->save($localCapa); //salvo a imagem,ja redimensionada

           $imgAntiga = $leitor->foto; //pego o nome da img antiga
           if($imgAntiga !== 'leitor.jpg'){ //só quero deletar a imagem caso n for a padrão
               if(Storage::disk('imgLeitor')->exists($imgAntiga)){
                   Storage::disk('imgLeitor')->delete($imgAntiga); //deleto a img antiga caso exista
               }
           }

           $leitor->foto = $imgNome;//atribuo ao campo o novo nome
           if($leitor->update()){
               Session::flash('sucesso','Sua foto foi atualizada com sucesso');
           }
           return redirect()->back();
       }
    }

    public function contato()
    {
       return view('leitor.contato');
    }

    public function sobre()
    {
        return view('leitor.sobre');
    }

    public function emailContato(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'nome' => 'required|alpha_spaces',
            'mensagem' => 'required|min:8'
        ]);

        $dados = [
            'nome' => $request->input(['nome']),
            'email' => $request->input(['email']),
            'mensagem' => $request->input(['mensagem']),
        ];

        \Mail::send('leitor.partes.emailContato', $dados, function ($message) use($dados){
            $message->from($dados['email'],$dados['nome']);
            $message->sender($dados['email']);
            $message->to('ppaperium@gmail.com');
            $message->subject('Mensagem de contato de '.$dados['nome']);
            $message->replyTo($dados['email']);
        });

        Session::flash('sucesso','Email de contato enviado com sucesso');
        return redirect()->back();
    }

}
