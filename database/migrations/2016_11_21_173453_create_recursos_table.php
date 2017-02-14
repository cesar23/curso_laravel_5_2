<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',20)->nullable()->comment('del recurso controlador');           
            $table->tinyInteger('orden')->nullable()->comment('orden del recurso')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });
        //----------------------INSERTS-----------------------------------
//--creamos el articulos
        $recurso= new App\Recurso();      
        $recurso->nombre="Usuarios";
        $recurso->orden=1;
        $recurso->active=1;        
        $recurso->save();

        $recurso= new App\Recurso();       
        $recurso->nombre="Categorias";
        $recurso->orden=2;
        $recurso->active=1;        
        $recurso->save();

        $recurso= new App\Recurso();        
        $recurso->nombre="Articulos";
        $recurso->orden=3;
        $recurso->active=1;        
        $recurso->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recursos');
    }
}
