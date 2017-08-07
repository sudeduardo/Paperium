<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('alpha_spaces', function ($attribute, $value)
        {
            return preg_match('/^[\pL\s]+$/u', $value);
        }); //crio a verficação de somente letras e espaços

        Validator::extend('alpha_num_spaces', function ($attribute, $value)
        {
            return preg_match('/^[\pL\s0-9]+$/u', $value);
        }); //crio a verficação de somente letras,numeros e espaços
 
        Carbon::setLocale('pt_BR'); //localização da diferença de datas da biblioteca carbon
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
