<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorLivroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_livro', function (Blueprint $table) {
            $table->integer('livro_id')->unsigned();
            $table->integer('autor_id')->unsigned();

            $table->primary(['livro_id', 'autor_id']);

            $table->foreign('livro_id')->references('id')->on('livros_digitais')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('autor_id')->references('id')->on('autores')
                  ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autor_livro');
    }
}
