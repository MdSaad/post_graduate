<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:46 PM
 */

namespace Modules\Ticketing\Requests;
use App\Http\Requests\Request;
use Session;

class ExpenseDetailsRequest extends Request
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
              $expense_head_rule = 'required';
              $expense_title_rule = 'required';
              $expense_date_rule = 'required';
              $expense_amount_rule = 'required';
        }
        else
        {
            Session::flash('method','store');
            $expense_head_rule = 'required';
            $expense_title_rule = 'required';
            $expense_date_rule = 'required';
            $expense_amount_rule = 'required';
        }

        return [
            'expense_head_id' => $expense_head_rule,
            'expense_title' => $expense_title_rule,
            'expense_date' => $expense_date_rule,
            'expense_amount' => $expense_amount_rule,
        ];
    }
}