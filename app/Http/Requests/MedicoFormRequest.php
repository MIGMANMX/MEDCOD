<?php

namespace MEDCOD\Http\Requests;

use MEDCOD\Http\Requests\Request;

class MedicoFormRequest extends Request
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
            'Nombre'=>'required|max:45',
            'Especialidad'=>'required|max:20',
        ];
    }
}
