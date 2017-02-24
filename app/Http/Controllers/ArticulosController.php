<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Articulo;
use App\Categoria;
use DB;
use Laracasts\Flash\Flash;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado=Articulo::orderBy('id','ASC')->paginate(3);
        //$results = DB::select('select * from usuarios where id_usuario = 1');
        //dd($listado);
        $data['listado']=$listado;
        $data['titulo']="Listado de articulos";
        return view('admin.articulos.index', $data);
        //return view('admin.articulos.index', ['listado' => $listado]);
        //return "ola";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categorias=Categoria::where('id_parent','!=', 0)->get();

       //-----------Creamos un array clave =>valor  para el listado de categorias
         $lst_categorias=array(""=>"------selecionar--------");
         foreach ($categorias as $row){
        $new_array=array($row->id=>$row->title);
        $lst_categorias +=$new_array; //llenamos los array
         }
         $lst_categorias=array_filter($lst_categorias);//limpiamos si hay uno en blanco
       //-------------------------------------------------------------  


        $data['titulo']="Crear Articulos";
        $data['lst_categorias']=$lst_categorias;
         return view('admin.articulos.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function up(Request $request)
    {
        //obtenemos el campo file definido en el formulario
       $file = $request->file('image');
 
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
 
       return "archivo guardado";
        var_dump($request->all());
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
