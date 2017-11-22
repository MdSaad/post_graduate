<?php

namespace Modules\Reports\Controllers;

use App\Helpers\DateQuery;
use DB;
use Modules\Admin\Models\Airlines;
use Modules\Reports\Requests\TicketInformationReportRequest;
use Modules\Ticketing\Models\ExpenseDetails;
use Modules\Admin\ExpenseHead;
use Modules\Ticketing\Models\PassengersTicketInfo;
use Session;
use Response;
use App\Http\Controllers\Controller;

class TicketInformationReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Ticket Information";
        $airlines_list = [''=>'Select Airlines'] + Airlines::where('status','active')->lists('airlines_name','id')->all();
        return view('reports::ticket_information.index', compact( 'page_title','airlines_list','page_title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generate_ticket_information_report(TicketInformationReportRequest $request){
        $input = $request->all();
        $page_title = "Ticket Information";

        $to_tate = $request->from_date;
        $end_tate = $request->to_date;

        $passenger_name = $request->passenger_name;
        $airlines_id = $request->airlines_id ;

        $model = new PassengersTicketInfo();

        $data = DateQuery::query_by_date_range($model,'issue_date',$to_tate,$end_tate);



        if(!empty($airlines_id)){
            $data = $data->where('airlines_id',$airlines_id);
        }


        if(!empty($passenger_name)){
            $data = $data->where('passenger_name','LIKE','%'.$passenger_name.'%');
        }
        $data = $data->get() ;
        $airlines_list = [''=>'Select Airlines'] + Airlines::where('status','active')->lists('airlines_name','id')->all();
        return view('reports::ticket_information.index', compact('data','airlines_list','page_title'));
    }
    public function details_ticket_information($id)
    {
        $page_title = "Passenger Ticket Information" ;
        if(!empty($id)){
            $data = PassengersTicketInfo::where('id',$id)->first();
            return view('reports::ticket_information.details', compact( 'data','page_title'));
        }
        return view('errors.404',array(),404);
    }
}