<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolsRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols_recursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_recurso')->unsigned();
            $table->string('cod_rol',8);
            $table->string('nombre',20)->nullable()->comment('del recurso controlador');  
            //-----permisos           
            $table->tinyInteger('menu')->default(0)->comment('permiso');
            $table->tinyInteger('agregar')->default(0)->comment('permiso');
            $table->tinyInteger('editar')->default(0)->comment('permiso');
            $table->tinyInteger('listar')->default(0)->comment('permiso');
            $table->tinyInteger('eliminar')->default(0)->comment('permiso');
            $table->tinyInteger('reporte')->default(0)->comment('permiso');
            //---------
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
             //indices PK,FK         
            $table->foreign('id_recurso')->references('id')->on('recursos')->onDelete('cascade');
            $table->foreign('cod_rol')->references('cod_rol')->on('rols')->onDelete('cascade');
        });

          //----------------------INSERTS-----------------------------------
//--creamos el articulos
       

        $recurso= new App\Rol_Recurso();
        $recurso->id_recurso=1;
        $recurso->cod_rol="AD";
        $recurso->nombre="usuarios";
        $recurso->menu=1;
        $recurso->agregar="Usuarios";
        $recurso->editar=1;
        $recurso->listar=1;
        $recurso->eliminar=1;
        $recurso->reporte=1;
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
        Schema::drop('rols_recursos');
    }
}
