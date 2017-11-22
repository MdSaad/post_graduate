<?php


namespace Modules\Admin\Requests;
use App\Http\Requests\Request;
use Session;

class CurrencyRequest extends Request
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
              $name_rule = 'required';
              $exchange_rate = 'required';
          }else{
            Session::flash('method','store');
            $name_rule = 'required';
            $exchange_rate = 'required';
          }

        return [

            'name' => $name_rule,
            'conversion_to'=>$exchange_rate
        ];
    }
}