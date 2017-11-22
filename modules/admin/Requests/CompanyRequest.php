<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:46 PM
 */

namespace Modules\Admin\Requests;
use App\Http\Requests\Request;
use Session;

class CompanyRequest extends Request
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
            // Update operation, exclude the record with id from the validation:
            Session::flash('method','update');
            $company_name_rule = 'required';
            $address1_rule = 'required';
          }else{
            Session::flash('method','store');
            $company_name_rule = 'required';
            $address1_rule = 'required';
          }
        return [
            'company_name' => $company_name_rule,
            'address1' => $address1_rule
        ];
    }
}