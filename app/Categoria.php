<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	/*
	   $table->integer('id_parent')->unsigned();        
        $table->integer('id_usuario')->unsigned();
        $table->string('title',400)->nullable();
        $table->string('title_url',400)->nullable(); 
        $table->string('imagen',255)->nullable();        
        $table->string('descripcion',255)->nullable(); 
        $table->string('meta_keywords',255)->nullable();  
        $table->tinyInteger('active')->default(1); 
	*/
        protected $table = "categorias";
        protected $fillable = ['id_parent','id_usuario','title','title_url','imagen','descripcion','meta_keywords','active'];


/*
Definición de la inversa de la relación
*/
public function usuario()
{
	/*
    	de uno a uno
    	//-- de dice que un usuario tien que estar en al tabla user
    	*/
	return $this->belongsTo('App\Usuario');
}



}
