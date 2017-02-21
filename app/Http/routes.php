<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('modelo', function () {

		$user= App\Usuario::find(1);
		//$user= App\Usuario::where('id_usuario', 1)->get();

		//@$user=new App\Usuario::find(1);
		$user->nombre = 'walter';
		$user->save();

//return $user->toArray();
		dd($user->full_nombre);

		// echo "<pre>",print_r($user->UsuarioFull),"</pre>";
	//$users = DB::table('usuarios')->get();
	//$users = DB::table('usuarios')->select('id_usuario', 'correo')->get();
	//echo "<pre>",print_r($users),"</pre>";
	
     //dd($user->all());
});
////---------------------------Admin
Route::group(['prefix'=>'admin'], function () {
    ///-----IMPORTANTE siempre ejecutar el
	/// paar ver las rutas ya creadas automaticamente y no volver a crearlas
    Route::resource('usuarios', 'UsuariosController');
   //---para eliminar
    Route::get('usuarios/{id}/destroy', [
'uses' =>'UsuariosController@destroy',
'as' =>'admin.usuarios.destroy'
    	]);
    //-------------------------------Categorias
     Route::resource('categorias', 'CategoriasController');
   //---para eliminar
    Route::get('categorias/{id}/destroy', [
'uses' =>'CategoriasController@destroy',
'as' =>'admin.categorias.destroy'
    	]);
    //-------------------------------Articulos
     Route::resource('articulos', 'ArticulosController');
   //---para eliminar
    Route::get('articulos/{id}/destroy', [
'uses' =>'ArticulosController@destroy',
'as' =>'admin.articulos.destroy'
    	]);
	

	});

