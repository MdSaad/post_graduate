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

class ExpenseSubHeadRequest extends Request
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
            $expense_subhead_name_rule = 'required';
            $expense_head_id_rule = 'required';
          }else{
            Session::flash('method','store');
            $expense_head_id_rule = 'required';
            $expense_subhead_name_rule = 'required';
          }
        return [
            'expense_head_id'=>$expense_head_id_rule,
            'expense_subhead_name' => $expense_subhead_name_rule,
        ];
    }
}