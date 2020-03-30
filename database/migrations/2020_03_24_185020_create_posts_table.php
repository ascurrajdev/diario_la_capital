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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('contenido_noticia');
            $table->string('titulo_noticia');
            $table->unsignedBigInteger('nivel_relevancia_id');
            $table->unsignedBigInteger('categoria_id'); 
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('nivel_relevancia_id')->references('id')->on('relevancias');
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
