<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('articulos_elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_articulo')->default('0'); 
            $table->string('descripcion',400)->nullable();
            $table->string('filename',400)->nullable();            
            $table->string('fileext',5)->nullable();
            $table->string('filesize',5)->nullable();        
            $table->tinyInteger('active')->default(1);                      
            $table->timestamps();
        //----FK,PK
              
        });


        //----------------------INSERTS-----------------------------------
//--creamos el articulos
        $articulo= new App\Articulo_Elemento();
        $articulo->id=1;
        $articulo->id_articulo=0;
        $articulo->descripcion="garfiel de navidad";
        $articulo->filename="garfield.jpg";
        $articulo->fileext="jpg";
        $articulo->filesize=12000;      
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
        Schema::drop('articulos_elementos');
    }
}
