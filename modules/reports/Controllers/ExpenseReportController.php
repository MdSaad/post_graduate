<?php

namespace Modules\Reports\Controllers;

use App\Helpers\DateQuery;
use DB;
use Modules\Admin\Models\ExpenseSubHead;
use Modules\Ticketing\Models\ExpenseDetails;
use Modules\Admin\Models\ExpenseHead;
use Modules\Ticketing\Models\PassengersTicketInfo;
use Session;
use Modules\Reports\Requests\ExpenseReportRequest ;
use App\Http\Controllers\Controller;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Expense Head Information";
       // $data = ExpenseDetails::where('status', '!=', 'cancel')->get();
        $expense_head_list = [''=>'Select Expense Head'] + ExpenseHead::where('status','active')->lists('expense_head_name','id')->all();
        $expense_subhead_list = [''=>'Select Expense SubHead'] ;
        return view('reports::expense_information.index', compact( 'page_title','expense_head_list','expense_subhead_list','page_title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generate_expense_information_report(ExpenseReportRequest $request){
        $page_title = "Expense Information";

        $to_date = $request->from_date;
        $end_date = $request->end_date;
        $head_id = $request->expense_head ;
        $subhead_id = $request->expense_subhead ;

        $model = new ExpenseDetails();

        $data = DateQuery::query_by_date_range($model,'expense_date',$to_date,$end_date);

        if(!empty($head_id)){
            $data = $data->where('expense_head_id',$head_id);
        }
        if(!empty($subhead_id)){
            $data = $data->where('expense_subhead_id',$subhead_id);
        }
        $data = $data->orderby('expense_date','asc')->orderby('expense_head_id','asc')->get() ;

        // $data = ExpenseDetails::where('status', '!=', 'cancel')->get();
        $expense_head_list = [''=>'Select Expense Head'] + ExpenseHead::where('status','active')->lists('expense_head_name','id')->all();
        $expense_subhead_list = [''=>'Select Expense SubHead'] ;
        return view('reports::expense_information.index', compact( 'page_title','data','expense_head_list','expense_subhead_list','page_title'));
    }

    public function details_expense_information($id){
        $page_title = "Expense Information";
        if(!empty($id)){
            $data = ExpenseDetails::where('id',$id)->first();
            return view('reports::expense_information.details', compact( 'page_title','data','expense_head_list','expense_subhead_list','page_title'));
        }
        return view('errors.404');
    }

    public function get_all_subhead($id){
        $str = '<option value="">Select SubHead</option>';
        if(!empty($id)){
            $data = ExpenseSubHead::where('status','active')->where('expense_head_id',$id)->get() ;
            foreach($data as $d){
                $str .='<option value="'.$d->id.'">'.$d->expense_subhead_name.'</option>';
            }
        }
        return $str;
    }

}