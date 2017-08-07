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
1. Clone ou baixe o repositório ``git clone https://github.com/sudeduardo/Paperium.git`` 
2. Entre dentro de `Paperium` ``cd Paperium `` 
3. Execute `composer install` 
4. Crie um database no mysql: `CREATE DATABASE Paperium;` 
5. Configure o `.env`: 
``` DB_DATABASE=Paperium 
    DB_USERNAME=root 
    DB_PASSWORD=password ``` 
6. Execute `php artisan migrate ` 
8. E para abrir o servidor: `php artisan serve` 
9. Abra http://localhost:8000/
