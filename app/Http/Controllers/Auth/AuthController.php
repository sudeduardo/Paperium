<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';
    protected $loginView = 'leitor.auth.auth';
    protected $registerView= 'leitor.auth.auth';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|max:255|alpha_spaces',
            'email' => 'required|email|max:255|unique:users',
            'senha' => 'required|min:6|alpha_num|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'password' => bcrypt($data['senha']),
        ]);
    }

    public function authenticated()
    {
        \Session::flash('sucesso','Login realizado com sucesso');
        return redirect($this->redirectTo);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        \Auth::guard($this->getGuard())->login($this->create($request->all()));
        \Session::flash('sucesso','Usuário cadastrado e logado com sucesso');
        return redirect($this->redirectPath());
    }
      
}
