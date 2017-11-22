<?php

namespace Modules\Reports\Requests;

use Session;
use App\Http\Requests\Request;

class TicketInformationReportRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
        ];
    }

}