<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    public function livrosDigitais()
    {
        return $this->hasMany('App\LivroDigital');
    }
}
