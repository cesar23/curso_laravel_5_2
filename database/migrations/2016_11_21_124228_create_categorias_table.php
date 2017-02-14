<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('id_parent')->unsigned();        
           $table->integer('id_usuario')->unsigned();
           $table->string('title',400)->nullable();
           $table->string('title_url',400)->nullable(); 
           $table->string('imagen',255)->nullable();        
           $table->string('descripcion',255)->nullable(); 
           $table->string('meta_keywords',255)->nullable();  
           $table->tinyInteger('active')->default(1); 
        //--- PK, FK                     
           $table->timestamps();
           $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');  
       });



 $categoria= new App\Categoria();
     $categoria->id_parent=0;
     $categoria->id_usuario=1;
     $categoria->title="Raiz";
     $categoria->title_url="";
     $categoria->imagen=NULL;
     $categoria->descripcion=NULL;
     $categoria->meta_keywords=NULL;
     $categoria->active=1;  
     $categoria->save();

     $articulo= new App\Categoria();
     $articulo->id_parent=1;
     $articulo->id_usuario=1;
     $articulo->title="Noticias";
     $articulo->title_url="noticias";
     $articulo->imagen=NULL;
     $articulo->descripcion="Noticias del dia en Peru,lima";
     $articulo->meta_keywords="noticias,peru,rpp,el comercio";
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
        Schema::drop('categorias');
    }
}
