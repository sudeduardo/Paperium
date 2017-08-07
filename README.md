# Paperium
Trabalho de Conclusão de Curso como objetivo de aumentar o  alcance da leitura proporcionado pela Biblioteca Publica de Mogi Mirim através de um sistema de web de leitura a acesso a informações de catalogo físico de Livros  

<h2>Repositórios usados:</h2>
<ul>
<li>dog-ears Multi Auth https://github.com/dog-ears/laravel-multi-auth</li>
<li>cauoecs Laravel-lang https://github.com/caouecs/Laravel-lang</li>
<li>jessengers Date https://github.com/jenssegers/date
<li>intervention Image https://github.com/Intervention/image</li>
</ul>
<h2>Configurar o servidor</h2>
<ol>
<li> Clone ou baixe o repositório git clone https://github.com/sudeduardo/Paperium.git </li>
<li> Entre dentro de Paperium -> "cd Paperium"  </li>
<li> Execute "composer install" </li>
<li> Crie um database no mysql: "CREATE DATABASE Paperium;" </li>
<li> Configure o ".env": <br>
        DB_DATABASE=Paperium <br>
        DB_USERNAME=root <br>
        DB_PASSWORD=password<br>
<li> Execute php artisan migrate</li>
<li> E para abrir o servidor: php artisan serve </li>
<li> Abra http://localhost:8000/</li>
</ol>
