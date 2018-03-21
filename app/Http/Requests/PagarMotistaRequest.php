<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PagarMotistaRequest extends Request
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
            'monto'=>'required',           
            'codigo_fac'=>'required',           
            'id_admin'=>'required',                    
            'id_moto_fac'=>'required',                    
        ];
    }
}
