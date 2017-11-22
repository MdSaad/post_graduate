<?php

namespace Modules\Hazz\Controllers;

use DB;
use App\Helpers\DateQuery;
use App\Http\Controllers\Controller;
use Modules\Hazz\Requests\HazzClientInfoRequest;

class HazzClientPaymentReceiveReportController extends Controller
{

    public function index()
    {
        $page_title = "Hazz Client Payment Receive";
        return view('hazz::hazz-client-payment-receive-report.index', compact('page_title', 'page_title'));
    }

    public function generate_hazz_client_payment_receive_report(HazzClientInfoRequest $request)
    {
        //$input = $request->all();

        $page_title = "Hazz Client Information";

        $to_tate = $request->from_date;
        $end_tate = $request->to_date;

        $model = DB::table('hazz_client_payment_receive AS hcpr')
            ->select(
                'hci.client_name',
                'hcpr.id',
                'hcpr.receive_date',
                'hcpr.receive_amount'
            )
            ->leftJoin(
                'hazz_client_information AS hci',
                'hci.id', '=', 'hcpr.hazz_client_information_id'
            );

        $data = DateQuery::query_by_date_range($model, 'receive_date', $to_tate, $end_tate);

        $data = $data->orderby('client_name','asc')->orderby('receive_date','asc')->get();
        //$data = $data->get();

        return view('hazz::hazz-client-payment-receive-report.index', compact('data', 'page_title'));
    }
}