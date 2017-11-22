<?php

namespace Modules\Hazz\Controllers;

use App\Helpers\DateQuery;
use App\Http\Controllers\Controller;
use Modules\Hazz\Models\HazzClientInfo;
use Modules\Reports\Requests\TicketInformationReportRequest;

class HazzClientInfoReportController extends Controller
{

    public function index()
    {
        $page_title = "Hazz Client Information";
        return view('hazz::hazz-client-info-report.index', compact('page_title', 'page_title'));
    }

    public function generate_hazz_client_info_report(TicketInformationReportRequest $request)
    {
        //$input = $request->all();

        $page_title = "Hazz Client Information";

        $to_tate = $request->from_date;
        $end_tate = $request->to_date;

        $model = new HazzClientInfo();

        $data = DateQuery::query_by_date_range($model, 'booking_date', $to_tate, $end_tate);

        $data = $data->get();

        return view('hazz::hazz-client-info-report.index', compact('data', 'page_title'));
    }
}