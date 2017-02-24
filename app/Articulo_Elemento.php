<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo_Elemento extends Model
{
	/*
  $table->increments('id');
      $table->integer('id_usuario')->unsigned();
      $table->integer('id_categoria')->unsigned();
      $table->string('title',400)->nullable();
      $table->string('title_url',400)->nullable(); 
      $table->string('imagen',255)->nullable();        
      $table->string('descripcion',255)->nullable(); 
      $table->string('meta_keywords',255)->nullable();  
      $table->text('content');
      $table->tinyInteger('active')->default(1);    
	*/
 

     protected $table = "articulos_elementos";
	protected $fillable = ['id','id_articulo','descripcion','filename','fileext','filesize','active','created_at','updated_at'];




}
