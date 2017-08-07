<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaLeituraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_leitura', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('livro_id')->unsigned();
            $table->smallInteger('pag_atual')->default(0);

            $table->primary(['user_id', 'livro_id']);

            $table->foreign('livro_id')->references('id')->on('livros_digitais')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('lista_leitura');
    }
}
