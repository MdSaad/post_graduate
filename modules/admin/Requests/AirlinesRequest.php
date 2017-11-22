<?php

namespace Modules\Ticketing\Requests;

use Session;
use App\Http\Requests\Request;

class AirlinesRequest extends Request
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
        if($this->method() == 'PATCH')
        {
              Session::flash('method','update');
              $airline_name_rule = 'required';
        }
        else
        {
            Session::flash('method','store');
            $airline_name_rule = 'required';
        }

        return [
            'airlines_name' => $airline_name_rule,
        ];
    }
}