<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*
 
   
      */
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_rol',8)->nullable();
            $table->string('usuario',45)->nullable()->comment('nombre del usuario');
            $table->string('nombre',45)->nullable();
            $table->string('correo')->unique();
            $table->string('pass')->nullable();
            $table->string('telefono',45)->nullable();
            $table->text('direccion')->nullable();
            $table->tinyInteger('active')->default(1);
            //$table->enum('type',['member','admin'])->default('member');
            $table->rememberToken();
            $table->timestamps();
        });


                  //----------------------INSERTS-----------------------------------
//--creamos el articulos
        $usuario= new App\Usuario();
        $usuario->cod_rol="AD";
        $usuario->usuario="cesar203";
        $usuario->nombre="Cesar Auris";
        $usuario->correo="sistemas_aempresarial@hotmail.com";
        $usuario->pass=md5("cesar203");
        $usuario->telefono="---";
        $usuario->direccion=NULL;
        $usuario->active=1;        
        $usuario->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
