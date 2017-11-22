<?php

namespace Modules\Admin\Requests;

use Session;
use App\Http\Requests\Request;

class CountryRequest extends Request
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
            $country_name_rule = 'required';
        }
        else
        {
            Session::flash('method','store');
            $country_name_rule = 'required';
        }

        return [
            'country_name' => $country_name_rule,
        ];
    }
}