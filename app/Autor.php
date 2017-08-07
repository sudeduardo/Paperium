<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';

    public function livrosDigitais()
    {
        return $this->belongsToMany('App\LivroDigital','autor_livro','autor_id','livro_id');
    }

    
}
