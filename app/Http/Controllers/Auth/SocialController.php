<?php

namespace App\Http\Controllers\Auth;

use App\SocialLogin;
use App\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Socialite;

class SocialController extends Controller
{

    public function redirectToProvider($provedor)
    {
        return Socialite::driver($provedor)->redirect();
    }

    public function handleProviderCallback($provedor)
    {
        if($user = Socialite::driver($provedor)->user()){   //verifico se veio alguma coisa
            if($leitorSocial = User::query()->where('email', $user->email)->first()){ //vejo se o emal ja esta cadastrado
                if($provedorLeitor = $leitorSocial->socialLogins()->where('provedor',$provedor)->first()){ //verifico se o leitor com tal email ja possui uma conta com o provedor
                    Auth::login($leitorSocial);
                }else{ //caso n cadastro as informações na tabela de login social
                    $socialLeitor = new SocialLogin;
                    $socialLeitor->user_id = $leitorSocial->id;
                    $socialLeitor->provedor = $provedor;
                    $socialLeitor->social_id = $user->id;
                    if($provedor == 'facebook'){ //parabens facebook e google por n seguir nenhum padrao
                        $socialLeitor->social_foto = $user->avatar_original;
                    }elseif ($provedor == 'google'){
                        $socialLeitor->social_foto = preg_replace("/sz=50/", "sz=500", $user->avatar);
                    }
                    $socialLeitor->save();

                    Auth::login($leitorSocial);
                }
            }else{ // se nao estiver o cadastro
                $leitor = new User;
                $leitor->nome = $user->name;
                $leitor->email = $user->email;
                $leitor->save();

                $socialLeitor = new SocialLogin; //agora vou salvar na tabela de login social
                $socialLeitor->user_id = $leitor->id;
                $socialLeitor->provedor = $provedor;
                $socialLeitor->social_id = $user->id;
                if($provedor == 'facebook'){ //parabens facebook e google por n seguir nenhum padrao
                    $socialLeitor->social_foto = $user->avatar_original;
                }elseif ($provedor == 'google'){
                    $socialLeitor->social_foto = preg_replace("/sz=50/", "sz=500", $user->avatar);
                }
                $socialLeitor->save();

                Auth::login($leitor);
            }
            \Session::put('provedor',$provedor); //aqui vem a gambiarra,coloco o provedor na sessao para poder manipula-lo
            \Session::flash('sucesso',"Login pelo $provedor realizado com sucesso");
            return redirect('/#');
        }else{
            return redirect('/login');
        }
    }
    
}