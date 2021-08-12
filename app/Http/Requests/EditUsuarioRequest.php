<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUsuarioRequest extends FormRequest
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
    //Validaciones para eliminar un usuario
    public function rules()
    {
        return [
            'nombres' => 'required|max:255',
            'email' => 'required|max:255',
            'id' => 'required|numeric',
            'apellido' => 'required|max:255',
            'ocupacion' => 'required|max:255',
        ];
    }
}
