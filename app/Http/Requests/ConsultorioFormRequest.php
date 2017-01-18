<?php

namespace MEDCOD\Http\Requests;

use MEDCOD\Http\Requests\Request;

class ConsultorioFormRequest extends Request
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
            'Consultorio'=>'required|max:15',
            'Descripcion'=>'required|max:45',
        ];
    }
}
