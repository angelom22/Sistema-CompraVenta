<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarUsuarioRequest extends FormRequest
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
        // dd($this->route());
        // dd($this->all('num_documento'));

        return [
            'nombre' => 'required',
            'tipo_documento' =>'required',
            'num_documento' => 'required|integer|unique:users,num_documento,'.$this->route('usuario'),
            'email' => 'required|unique:users,email,'.$this->route('usuario'),
            'usuario' => 'required|unique:users,usuario,'.$this->route('usuario'),
            'imagen' => 'image'
        ];
    }
}
