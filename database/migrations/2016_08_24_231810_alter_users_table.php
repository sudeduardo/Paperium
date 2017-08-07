<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('users',function(Blueprint $table){
            $table->string('password')->nullable()->change();
            $table->string('foto')->default('leitor.jpg')->change();
            //$table->boolean('social')->default(false);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function($table){
            //$table->dropColumn('social');
        });
    }
}
