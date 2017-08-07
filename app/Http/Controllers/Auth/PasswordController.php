<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $linkRequestView = 'leitor.auth.passwords.email';
    protected $resetView = 'leitor.auth.passwords.reset';
    protected $emailsView = 'leitor.auth.emails.password';
    protected $subject = 'Redefinição de senha';
    protected $redirectPath = '/';
    
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function getSendResetLinkEmailSuccessResponse($response) //funcao email enviado com sucesso
    {
        \Session::flash('sucesso',trans($response));
        return redirect()->back();
    }

    protected function getResetSuccessResponse($response)   //funcao senha redefinida com sucesso
    {
        \Session::flash('sucesso',trans($response));
        return redirect($this->redirectPath());
    }

    protected function getResetValidationRules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|alpha_num|confirmed|min:6',
        ];
    }
}
