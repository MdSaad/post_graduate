<?php

namespace Modules\Umrah\Requests;

use Session;
use App\Http\Requests\Request;

class UmrahClientInfoRequest extends Request
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
              //$category_name_rule = 'required|max:64|unique:country,country_name,'.$this->id;
        }
        else
        {
            Session::flash('method','store');
            //$category_name_rule = 'required|max:64|unique:country';
        }

        return [
            //'country_name' => $category_name_rule,
        ];
    }
}