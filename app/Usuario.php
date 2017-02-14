<?php

namespace App;
//use App\CustomCollection;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = "usuarios";
	protected $fillable = ['id','cod_rol','usuario','nombre','correo','telefono','direccion','active'];

	
//Relaciones-------------------------------------
	public function categorias()
    {
    	/*
    	One To Many
    	Uno a muchos
    	*/
        return $this->hasMany('App\Categoria');
    }

    	public function articulos()
    {
    	/*
    	One To Many
    	Uno a muchos
    	*/
        return $this->hasMany('App\Articulo');
    }


//---------------------------------------------------------

	///------conversiones al pedir i setear atributos
	  public function getNombreAttribute($value)
    {
        return ucfirst($value);
        //--nota:
        // todas la peticiones a la columna  nombre seran con mayusculas
    }

      public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtolower($value);
         //--nota:
        // todas la peticiones con set al objeto  nombre seran con mayusculas
    }
    //--puebas
    public function getFullNombreAttribute(){
		return $this->usuario." ".$this->correo;
		//demo
		// $user= App\Usuario::find(1);	
		// $user->full_nombre;
	}


	///----------ZF"-----------------
    public function exchangeArray($data) {
        $this->id_posts = (isset($data['id_posts'])) ? $data['id_posts'] : null;
        $this->id_usuario = (isset($data['id_usuario'])) ? $data['id_usuario'] : null;
        $this->post_is_script = (isset($data['post_is_script'])) ? $data['post_is_script'] : null;
        $this->post_is_galeria = (isset($data['post_is_galeria'])) ? $data['post_is_galeria'] : 0;
        $this->post_titulo = (isset($data['post_titulo'])) ? $data['post_titulo'] : null;
        $this->post_titulo_menu = (isset($data['post_titulo_menu'])) ? $data['post_titulo_menu'] : null;
        $this->post_titulo_url = (isset($data['post_titulo_url'])) ? $data['post_titulo_url'] : null;
        $this->post_descripcion = (isset($data['post_descripcion'])) ? $data['post_descripcion'] : null;
        $this->post_meta_descripcion = (isset($data['post_meta_descripcion'])) ? $data['post_meta_descripcion'] : null;
        $this->post_keywords = (isset($data['post_keywords'])) ? $data['post_keywords'] : null;
        $this->post_contenido = (isset($data['post_contenido'])) ? $data['post_contenido'] : null;
        $this->post_status = (isset($data['post_status'])) ? $data['post_status'] : 0;
        $this->portada = (isset($data['portada'])) ? $data['portada'] : 0;
        $this->post_is_coment = (isset($data['post_is_coment'])) ? $data['post_is_coment'] : 0;
        $this->post_password = (isset($data['post_password'])) ? $data['post_password'] : null;
        $this->post_type = (isset($data['post_type'])) ? $data['post_type'] : null;
        $this->post_fecha = (isset($data['post_fecha'])) ? $data['post_fecha'] : null;
        $this->post_update = (isset($data['post_update'])) ? $data['post_update'] : null;
    }


    public function exchangeArrayEntity(Post $data) {
        $data=$data->getArrayCopy();
        //echo "<pre>", print_r($data), "</pre>";
        //echo $data['cod_rol'];
        //exit;


        $this->id_posts = (isset($data['id_posts'])) ? $data['id_posts'] : null;
        $this->id_usuario = (isset($data['id_usuario'])) ? $data['id_usuario'] : null;
        $this->post_is_script = (isset($data['post_is_script'])) ? $data['post_is_script'] : null;
        $this->post_is_galeria = (isset($data['post_is_galeria'])) ? $data['post_is_galeria'] : 0;
        $this->post_titulo = (isset($data['post_titulo'])) ? $data['post_titulo'] : null;
        $this->post_titulo_menu = (isset($data['post_titulo_menu'])) ? $data['post_titulo_menu'] : null;
        $this->post_titulo_url = (isset($data['post_titulo_url'])) ? $data['post_titulo_url'] : null;
        $this->post_descripcion = (isset($data['post_descripcion'])) ? $data['post_descripcion'] : null;
        $this->post_meta_descripcion = (isset($data['post_meta_descripcion'])) ? $data['post_meta_descripcion'] : null;
        $this->post_keywords = (isset($data['post_keywords'])) ? $data['post_keywords'] : null;
        $this->post_contenido = (isset($data['post_contenido'])) ? $data['post_contenido'] : null;
        $this->post_status = (isset($data['post_status'])) ? $data['post_status'] : 0;
        $this->portada = (isset($data['portada'])) ? $data['portada'] : 0;
        $this->post_is_coment = (isset($data['post_is_coment'])) ? $data['post_is_coment'] : 0;
        $this->post_password = (isset($data['post_password'])) ? $data['post_password'] : null;
        $this->post_type = (isset($data['post_type'])) ? $data['post_type'] : null;
        $this->post_fecha = (isset($data['post_fecha'])) ? $data['post_fecha'] : null;
        $this->post_update = (isset($data['post_update'])) ? $data['post_update'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }


}
