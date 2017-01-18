<?php

namespace MEDCOD\Http\Requests;

use MEDCOD\Http\Requests\Request;

class PacienteFormRequest extends Request
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

    public function rules()
    {
        return [
            'Nombre'=>'required|max:50',
            'Apellido'=>'required|max:50',
            'Direccion'=>'max:45',
            'Email'=>'max:45',
            'Telefono'=>'required|numeric',
            'Fecha_Nac'=>'required|numeric',
            'idConsultorio'=>'required',
            'idMedicos'=>'required',

        ];
    }
}
