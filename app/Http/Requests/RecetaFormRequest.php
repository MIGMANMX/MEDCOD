<?php

namespace MEDCOD\Http\Requests;

use MEDCOD\Http\Requests\Request;

class RecetaFormRequest extends Request
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
            'idPacientes'=>'required',
            'Recomendaciones'=>'required|max:300',
            'Observaciones'=>'max:500',
            'Medicacion'=>'max:350',
            
        ];
    }
}
