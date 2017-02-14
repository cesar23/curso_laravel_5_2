<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsuarioRequest;
use App\Usuario;
use DB;
use Laracasts\Flash\Flash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado=Usuario::orderBy('id','ASC')->paginate(3);
        //$results = DB::select('select * from usuarios where id_usuario = 1');
        //dd($usuarios);
        return view('admin.usuarios.index', ['listado' => $listado]);
        //return "ola";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $results =new \App\Rol();
        // dd($results->listar());
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {


        $objRest = new \App\Librerias\RestClass();




        if (!$objRest->isXmlHttpRequest()) {
            $entidad = new Usuario($request->all());
            $entidad->active=(isset($request->active)) ? $request->active:0;
            $entidad->pass=md5($request->pass);
            $entidad->save();
            $insertedId = $entidad->id;

            $msg='Se Creo usuario con el id: <b>'.$insertedId.'</b>';        
            flash($msg, 'success')->important();
            return redirect()->route('admin.usuarios.index');
        }

        $respuesta['data']['is_imagen_cargada'] = '';
        $respuesta['msg'] = '';
        $respuesta['success'] = '';
        $respuesta['status'] = '';
        $respuesta['last_id'] = '';


        try {
            $data=  $request->all();

            $entidad = new Usuario($request->all());
            $entidad->active=(isset($request->active)) ? $request->active:0;
            $entidad->pass=md5($request->pass);
            $entidad->save();
            $insertedId = $entidad->id;


        ///--------SQL :1
        // $dataset = array('correo' => 'peruu2@gmail.com', 'active' => 1);
        // $insertedId = DB::table('usuarios')->insertGetId($dataset,'id_usuario');
        //---------SQL: 2
         // $insert = Usuario::create($request->all());
         // $insertedId = $insert->id;
        //---------SQL: 3
        // $insertedId = DB::insert('insert into usuarios (correo, active) values (?, ?)', ['p9898989@gmail.com', 1]);
        // $insertedId = DB::getPdo()->lastInsertId();


            $respuesta['data']['is_imagen_cargada'] = 0;
            $respuesta['msg'] = 'Se guardo con exito con el ID:'.$insertedId; 
            $respuesta['success'] = true;
            $respuesta['status'] = 200;
            $respuesta['last_id'] = $insertedId;
            $objRest->mostrarRespuesta($objRest->convertirJson($respuesta));



        } catch (\Exception $e) {
            $respuesta['data']['is_imagen_cargada'] = 0;
            $respuesta['success'] = false;
            $respuesta['status'] = 500;
            if(DISPLAY_EXCEPTIONS_APP==true){
                $respuesta['msg'] = $e->getMessage();
            }else{
             $respuesta['msg'] = "No se pudo ingresar el registro por duplicidad o por otros motivos.<br>para ver los errores poner en debug (config.php)";
         }

         $objRest->mostrarRespuesta($objRest->convertirJson($respuesta));     
        //dd($usuario);
     }




 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "<pre>", print_r(), "</pre>";
        exit;
        
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

        $entidad= Usuario::find($id);
        $dataView['id'] = $entidad->id;
        $dataView['cod_rol'] = $entidad->cod_rol;
        $dataView['usuario'] = $entidad->usuario;
        $dataView['nombre'] = $entidad->nombre;
        $dataView['correo'] = $entidad->correo;
        $dataView['pass'] = $entidad->pass;
        $dataView['telefono'] = $entidad->telefono;
        $dataView['direccion'] = $entidad->direccion;
        $dataView['active'] = ($entidad->active==1)?true:false;
        $dataView=(object)$dataView;
        //$dataView['active'] = ($entidad->active==1)?true:false;


        //dd($entidad->usuario);
        //return view('admin.usuarios.edit',['row' => $dataView])->with('entidad',$entidad);
        return view('admin.usuarios.edit',['entidad' => $dataView]);
         //return view('admin.usuarios.edit');
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
       
        $objRest = new \App\Librerias\RestClass();


        if (!$objRest->isXmlHttpRequest()) {
           $entidad= Usuario::find($id);
           $entidad->fill($request->all());
           $entidad->active=(isset($request->active)) ? $request->active:0;
           $entidad->save();
           $insertedId = $entidad->id;
           $msg='Se Edito usuario con el id: <b>'.$id.'</b>';        
           flash($msg, 'success')->important();
           return redirect()->route('admin.usuarios.index');
       }



//Si la peticin es Ajax

       $respuesta['data']['is_imagen_cargada'] = '';
       $respuesta['msg'] = '';
       $respuesta['success'] = '';
       $respuesta['status'] = '';
       $respuesta['last_id'] = '';


       try {
        $data=  $request->all();

        $entidad= Usuario::find($id);
        $entidad->fill($request->all());
        $entidad->active=(isset($request->active)) ? $request->active:0;
        $entidad->save();
        $insertedId = $entidad->id;


        ///--------SQL :1
        // $dataset = array('correo' => 'peruu2@gmail.com', 'active' => 1);
        // $insertedId = DB::table('usuarios')->insertGetId($dataset,'id_usuario');
        //---------SQL: 2
         // $insert = Usuario::create($request->all());
         // $insertedId = $insert->id;
        //---------SQL: 3
        // $insertedId = DB::insert('insert into usuarios (correo, active) values (?, ?)', ['p9898989@gmail.com', 1]);
        // $insertedId = DB::getPdo()->lastInsertId();


        $respuesta['data']['is_imagen_cargada'] = 0;
        $respuesta['msg'] = 'Se Edito con exito con el ID:'.$insertedId; 
        $respuesta['success'] = true;
        $respuesta['status'] = 200;
        $respuesta['last_id'] = $insertedId;
        $objRest->mostrarRespuesta($objRest->convertirJson($respuesta));



    } catch (\Exception $e) {
        $respuesta['data']['is_imagen_cargada'] = 0;
        $respuesta['success'] = false;
        $respuesta['status'] = 500;
        if(DISPLAY_EXCEPTIONS_APP==true){
            $respuesta['msg'] = $e->getMessage();
        }else{
         $respuesta['msg'] = "No se pudo ingresar el registro por duplicidad o por otros motivos.<br>para ver los errores poner en debug (config.php)";
     }

     $objRest->mostrarRespuesta($objRest->convertirJson($respuesta)); 

        //dd($usuario);
 }
 

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entidad= Usuario::find($id);
        $entidad->delete();
        $msg='Se elimino usuario con el id: <b>'.$id.'</b>';
        flash($msg, 'danger')->important();
        return redirect()->route('admin.usuarios.index');

        dd($id);

    }
}
