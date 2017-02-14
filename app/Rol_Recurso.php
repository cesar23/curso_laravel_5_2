<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol_Recurso extends Model
{
	/*
  $table->increments('id');
            $table->integer('id_recursos')->unsigned();
            $table->string('cod_rol',8);
            $table->string('nombre',20)->nullable()->comment('del recurso controlador');             
            $table->tinyInteger('menu')->default(0);
            $table->tinyInteger('agregar')->default(0);
            $table->tinyInteger('editar')->default(0);
            $table->tinyInteger('listar')->default(0);
            $table->tinyInteger('eliminar')->default(0);
            $table->tinyInteger('reporte')->default(0);
	*/
     protected $table = "rols_recursos";
	protected $fillable = ['id','id_recurso','cod_rol','nombre','menu','agregar','editar','listar','eliminar','reporte','active','created_at','updated_at'];




}
