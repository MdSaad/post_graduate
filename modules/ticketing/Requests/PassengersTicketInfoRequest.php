<?php

namespace Modules\Ticketing\Requests;

use Session;
use App\Http\Requests\Request;

class PassengersTicketInfoRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'PATCH') {
            Session::flash('method', 'update');
            //$program_name_rule = 'required|max:64';
        } else {
            Session::flash('method', 'store');
            //$program_name_rule = 'required|max:64';

        }

        return [
            //'name' => $program_name_rule,
        ];
    }

}