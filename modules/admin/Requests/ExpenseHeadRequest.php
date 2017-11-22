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

class ExpenseHeadRequest extends Request
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
            $expense_head_name_rule = 'required';
          }else{
            Session::flash('method','store');
            $expense_head_name_rule = 'required';
          }
        return [
            'expense_head_name' => $expense_head_name_rule,
        ];
    }
}