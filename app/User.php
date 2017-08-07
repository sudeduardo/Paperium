<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'nome', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function livrosDigitais()
    {
        return $this->belongsToMany('App\LivroDigital','lista_leitura','user_id','livro_id')->withPivot('pag_atual');
    }

    public function socialLogins()
    {
        return $this->hasMany('App\SocialLogin');
    }

    public function verificaSocialLogins()
    {
        if(\Auth::user()->socialLogins()->count() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function fotoSocialLogins()
    {
        $foto = \Auth::user()->socialLogins->where('provedor',\Session::get('provedor'))->first()->social_foto;
        return $foto;
    }

}
