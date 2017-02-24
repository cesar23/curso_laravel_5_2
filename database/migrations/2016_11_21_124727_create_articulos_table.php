<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->enum('type',['post','page'])->default('post');
            $table->string('title',400)->nullable();
            $table->string('title_url',400)->nullable(); 
            //$table->string('imagen',255)->nullable();        
            $table->string('descripcion',255)->nullable(); 
            $table->string('meta_keywords',255)->nullable();  
            $table->text('content');
            $table->tinyInteger('active')->default(1);                      
            $table->timestamps();
        //----FK,PK
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');    
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');     
        });


        //----------------------INSERTS-----------------------------------
//--creamos el articulos
        $articulo= new App\Articulo();
        $articulo->id_usuario=1;
        $articulo->id_categoria=1;
        $articulo->title="post";
        $articulo->title="Noticia de ultima hora";
        $articulo->title_url="noticia-de-ultima-hora";
       // $articulo->imagen=NULL;
        $articulo->descripcion="esta es una noticia muy buena";
        $articulo->meta_keywords="ultima,rpp,peruanos";
        $articulo->content="conteido d e la noticia";
        $articulo->active=1;

        $articulo->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}
