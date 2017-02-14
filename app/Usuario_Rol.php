<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Rol extends Model
{
	/*
  $table->increments('id');
        $table->integer('id_usuario')->unsigned();            
        $table->string('cod_rol',8);  
	*/
     protected $table = "usuarios_rols";
	protected $fillable = ['id','cod_rol','id_usuario','cod_rol'];
}
