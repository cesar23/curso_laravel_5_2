<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        'usuario' => 'required|min:4|max:45',
        'correo' => 'required|max:250|unique:usuarios',
        'pass'=>'min:4|max:45'
        ];
    }
}
