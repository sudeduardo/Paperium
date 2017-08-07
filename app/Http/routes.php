<?php

//Rotas de autenticação
Route::get('/login', 'Auth\AuthController@showLoginForm');
Route::post('/login', 'Auth\AuthController@login');
Route::get('/login/{provedor}', 'Auth\SocialController@redirectToProvider');
Route::get('/login/callback/{provedor}', 'Auth\SocialController@handleProviderCallback');
Route::get('/logout', 'Auth\AuthController@logout');

// Rotas de cadastro do usuario
Route::get('/cadastro', 'Auth\AuthController@showRegistrationForm');
Route::post('/cadastro', 'Auth\AuthController@register');

// Rotas de redefinição de senha do usuario
Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Auth\PasswordController@reset');

//Rotas das páginas
Route::get('/', 'LeitorController@index');
Route::get('/fisico','LeitorController@acervoFisico');
Route::get('/perfil',['middleware' => 'auth','uses' => 'LeitorController@mostraPerfil']);
Route::get('/contato','LeitorController@contato');
Route::get('/sobre','LeitorController@sobre');
Route::get('/genero/{genero}','LeitorController@generoLivros');
Route::get('/autor/{autor}','LeitorController@autorLivros');
Route::get('/download/{id}','LeitorController@downloadLivroDigital');
Route::post('/contato/email','LeitorController@emailContato');

//Rotas de pesquisa
Route::get('/pesquisa/redireciona','LeitorController@redirecionaPesquisa');
Route::get('/pesquisa/{pesquisa}','LeitorController@pesquisaGeral');
Route::get('/genero/{genero}/pesquisa','GeneroController@pesquisaGeneroRedireciona');
Route::get('/genero/{urlGenero}/pesquisa/{pesquisa}',['as' => 'pesquisa.genero','uses' => 'GeneroController@pesquisaGeneroLivros']);
Route::get('/autor/{autor}/pesquisa','AutorController@pesquisaAutorRedireciona');
Route::get('/autor/{urlAutor}/pesquisa/{pesquisa}',['as' => 'pesquisa.autor','uses' => 'AutorController@pesquisaAutorLivros']);

//Rotas de ajax da lista de livros digitais do usuario
Route::post('/adicionar/leitura','LivroDigitalController@adicionarLivroLeitura');
Route::delete('/remover/leitura','LivroDigitalController@removerLivroLeitura');
Route::get('/leitura/{arquivo}/salvar/{pagina}','LivroDigitalController@atualizarPaginaLeitura'); //gambiarra,era pra ser post

// Rotas de operações com o perfil do leitor
Route::post('/mudar/senha','LeitorController@mudarSenha');
Route::post('/mudar/foto','LeitorController@mudarFoto');

/* rotas admin */
//Rotas de autenticação
Route::get('/admin/login', 'AdminAuth\AuthController@showLoginForm');
Route::post('/admin/login', 'AdminAuth\AuthController@login');
Route::get('/admin/logout', 'AdminAuth\AuthController@logout');
// Cadastro()
//Route::get('/admin/register', 'AdminAuth\AuthController@showRegistrationForm');
//Route::post('/admin/register', 'AdminAuth\AuthController@register');
//Redefinição de senha
Route::get('/admin/password/reset/{token?}', 'AdminAuth\PasswordController@showResetForm');
Route::post('/admin/password/email', 'AdminAuth\PasswordController@sendResetLinkEmail');
Route::post('/admin/password/reset', 'AdminAuth\PasswordController@reset');

Route::group(['prefix' => 'admin','as' => 'admin::'], function(){
    //Páginas
    Route::post('/mudar/senha',['as' => 'mudar.senha', 'uses' => 'AdminController@mudarSenha']);
    Route::get('/livros/digitais/{rota}',[ 'as' => 'livros.index', 'uses' => 'AdminController@index']);

    //Autor
    Route::post('/cadastra/autor',[ 'as' => 'cadastra.autor', 'uses' => 'AutorController@cadastraAutor']);
    Route::get('/autor/{id}',[ 'as' => 'mostra.autor', 'uses' => 'AdminController@mostraAutor']);
    Route::get('/autor/edita/{id}',[ 'as' => 'mostra.edita.autor', 'uses' => 'AdminController@mostraAutor']);
    Route::put('/autor/{id}',[ 'as' => 'atualiza.autor', 'uses' => 'AutorController@atualizaAutor']);
    Route::get('/autor/deleta/{id}',[ 'as' => 'mostra.deleta.autor', 'uses' => 'AdminController@mostraAutor']);
    Route::delete('/autor/{id}',[ 'as' => 'deleta.autor', 'uses' => 'AutorController@deletaAutor']);

    //Genero
    Route::get('/cadastra/genero',[ 'as' => 'cadastra.genero', 'uses' => 'AdminController@formCadastraGenero']);
    Route::post('/cadastra/genero',[ 'as' => 'cadastra.genero', 'uses' => 'GeneroController@cadastraGenero']);
    Route::get('/genero/{id}',[ 'as' => 'mostra.genero', 'uses' => 'AdminController@mostraGenero']);
    Route::get('/genero/edita/{id}',[ 'as' => 'mostra.edita.genero', 'uses' => 'AdminController@formEditaGenero']);
    Route::put('/genero/{id}',[ 'as' => 'atualiza.genero', 'uses' => 'GeneroController@atualizaGenero']);
    Route::get('/genero/deleta/{id}',[ 'as' => 'mostra.deleta.genero', 'uses' => 'AdminController@mostraGenero']);
    Route::delete('/genero/{id}',[ 'as' => 'deleta.genero', 'uses' => 'GeneroController@deletaGenero']);
    
    //Livro
    Route::get('/cadastra/livro',[ 'as' => 'cadastra.livro', 'uses' => 'AdminController@formCadastraLivro']);
    Route::post('/cadastra/livro',[ 'as' => 'cadastra.livro', 'uses' => 'LivroDigitalController@cadastraLivro']);
    Route::get('/livro/{id}',[ 'as' => 'mostra.livro', 'uses' => 'AdminController@mostraLivro']);
    Route::get('/livro/edita/{id}',[ 'as' => 'mostra.edita.livro', 'uses' => 'AdminController@formEditaLivro']);
    Route::put('/livro/{id}',[ 'as' => 'atualiza.livro', 'uses' => 'LivroDigitalController@atualizaLivro']);
    Route::get('/livro/deleta/{id}',[ 'as' => 'mostra.deleta.livro', 'uses' => 'AdminController@mostraLivro']);
    Route::delete('/livro/{id}',[ 'as' => 'deleta.livro', 'uses' => 'LivroDigitalController@deletaLivro']);

    //Rotas do Acervo Fisico
    Route::get('/fisico',[ 'as' => 'fisico', 'uses' => 'AdminController@livrosFisico']);
    //Dowlaod do programa
    Route::get('/download',[ 'as' => 'fisico', 'uses' => 'AdminController@LivroDownload']);
});

Route::post('/upload/json',"LivroFisicoController@Upload");
Route::get('/fisico',"LivroFisicoController@Pesquisar");
Route::get('/{hash}',function ($hash){

   return  \Illuminate\Support\Facades\Hash::make($hash);
});
