<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosDigitaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros_digitais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100)->unique();
            $table->smallInteger('ano_publicacao'); //não precisa maior que small ja que é só o ano
            $table->string('arquivo');
            $table->string('capa');
            $table->integer('genero_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('genero_id')->references('id')->on('generos')
                    ->onUpdate('cascade')
                    ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('livros_digitais');
    }
}
