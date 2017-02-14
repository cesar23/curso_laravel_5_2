<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
	/*
 $table->string('nombre',8)->nullable()->comment('del recurso controlador');           
            $table->tinyInteger('orden')->nullable()->comment('orden del recurso')->default(1);
            $table->tinyInteger('active')->default(1);  
	*/
     protected $table = "recursos";
	protected $fillable = ['id','nombre','orden','active','created_at','updated_at'];




}
