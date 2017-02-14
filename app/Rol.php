<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rols";
	protected $fillable = ['cod_rol','rol_name','active'];

/*
	public function listar(){
		//$resultset = DB::table($this->table)->select('cod_rol', 'rol_name')->get();
		$resultset = DB::table('rols')->get();

		$result = $resultset->toArray();
		return $result;
		
	}*/

}
