<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //llave primaria
            $table->bigIncrements('id');
            //llave foranea
            //investigar para que es el unsigned()
            $table->bigInteger('user_id')->unsigned();
            //tipo varchar(255)
            $table->string('title');
            //para que sea unico osea que no haya un registro con el mismo contenido
            $table->string('slug')->unique();
            //para que acepte el campo como nulo
            $table->string('image')->nullable();
            //tipo text
            $table->text('body');
            $table->string('iframe')->nullable();
            //para crear los campos created_at y updated_at
            $table->timestamps();
            //para especificar la relacion de la tabla foranea
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
