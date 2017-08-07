var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.styles([
            '../../../public/css/custom/menu.css',
            '../../../public/css/custom/reset.css',
            '../../../public/css/libraries/bootstrap.min.css',
            '../../../public/css/libraries/font-awesome.css',
            '../../../public/css/libraries/fileinput.min.css'
            ], 'public/css/builds/leitor.css') // css padrao do leitor
       .styles([
            '../../../public/css/custom/menu.css',
            '../../../public/css/custom/reset.css',
            '../../../public/css/libraries/bootstrap.min.css',
            '../../../public/css/libraries/dataTables.bootstrap.min.css',
            '../../../public/css/libraries/font-awesome.css',
            '../../../public/css/libraries/fileinput.min.css'
            ], 'public/css/builds/admin.css') // css padrao do admin
       .styles([
            '../../../public/css/libraries/bootstrap.min.css',
            '../../../public/css/libraries/font-awesome.css',
            '../../../public/css/libraries/bootstrap-social.css',
            '../../../public/css/custom/login.css'
            ], 'public/css/builds/login.css') ;// css padrao das paginas de login

    mix.scripts([
           '../../../public/js/libraries/jquery.js',
           '../../../public/js/libraries/bootstrap.min.js',
           '../../../public/js/libraries/bootstrap-notify.min.js',
           '../../../public/js/libraries/jquery.menu-aim.js',
           '../../../public/js/libraries/fileinput.min.js',
           '../../../public/js/custom/main.js',
           '../../../public/js/custom/leitor.js',
           '../../../public/js/lang/locales/pt-BR.js'
        ], 'public/js/builds/leitor.js')
       .scripts([
           '../../../public/js/libraries/jquery.js',
           '../../../public/js/libraries/bootstrap.min.js',
           '../../../public/js/libraries/bootstrap-notify.min.js',
           '../../../public/js/libraries/jquery.menu-aim.js',
           '../../../public/js/libraries/jquery.dataTables.min.js',
           '../../../public/js/libraries/dataTables.bootstrap.min.js',         
           '../../../public/js/custom/main.js',
           '../../../public/js/custom/admin-livrosDigitais.js',
           '../../../public/js/libraries/fileinput.min.js',
           '../../../public/js/lang/locales/pt-BR.js'
       ], 'public/js/builds/admin.js')
        .scripts([
           '../../../public/js/libraries/jquery.js',
           '../../../public/js/libraries/bootstrap.min.js',
           '../../../public/js/libraries/bootstrap-notify.min.js',
           '../../../public/js/custom/login.js'
       ], 'public/js/builds/login.js');

});
