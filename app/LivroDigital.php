<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivroDigital extends Model
{
    protected $table = 'livros_digitais';

    public function genero()
    {
        return $this->belongsTo('App\Genero');
    }

    public function autores()
    {
        return $this->belongsToMany('App\Autor','autor_livro','livro_id','autor_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','lista_leitura','livro_id','user_id')->withPivot('pag_atual');
    }
    
}
