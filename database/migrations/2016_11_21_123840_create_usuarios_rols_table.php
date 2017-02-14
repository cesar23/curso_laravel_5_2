<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_rols', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_usuario')->unsigned();            
        $table->string('cod_rol',8);  
             //indices PK,FK         
        $table->foreign('cod_rol')->references('cod_rol')->on('rols')->onDelete('cascade');
        $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        $table->timestamps();
    });

     $user=new App\Usuario_Rol();
     $user->id_usuario=1;
     $user->cod_rol="AD";
     $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios_rols');
    }
}
