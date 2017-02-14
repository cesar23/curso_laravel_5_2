<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->string('cod_rol',8); 
            $table->string('rol_name',45);
            $table->tinyInteger('active')->default(1);
            //indices PK,FK
            $table->primary('cod_rol'); 
            
            $table->timestamps();
        });
          //----------------------INSERTS-----------------------------------
//--creamos el articulos
        
        $rol= new App\rol();
        $rol->cod_rol="AD";
        $rol->rol_name="Administrador";
        $rol->active=1; 
        $rol->save();

        $rol= new App\rol();
        $rol->cod_rol="GES";
        $rol->rol_name="Gestor de contenido";
        $rol->active=1; 
        $rol->save();
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rols');
    }
}
