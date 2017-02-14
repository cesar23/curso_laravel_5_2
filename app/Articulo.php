<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
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
     protected $table = "articulos";
	protected $fillable = ['id','id_usuario','id_categoria','type','title','title_url','imagen','descripcion','meta_keywords','content','active','created_at','updated_at'];


/*
Definición de la inversa de la relación
*/
public function categoria()
{
	/*
    	de uno a uno
    	//-- de dice que un usuario tien que estar en al tabla user
    	*/
	return $this->belongsTo('App\Categoria');
}

public function usuario()
{
	/*
    	de uno a uno
    	//-- de dice que un usuario tien que estar en al tabla user
    	*/
	return $this->belongsTo('App\Usuario');
}

}
