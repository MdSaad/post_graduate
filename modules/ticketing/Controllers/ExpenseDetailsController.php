<?php

namespace Modules\Ticketing\Controllers;

use DB;
use Modules\Admin\Models\ExpenseSubHead;
use Modules\Ticketing\Models\ExpenseDetails;
use Modules\Admin\Models\ExpenseHead;
use Session;
use Modules\Ticketing\Requests\ExpenseDetailsRequest ;
use App\Http\Controllers\Controller;

class ExpenseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Expense Details Information";
        $disabled = 'disabled';
        $data = ExpenseDetails::where('status', '!=', 'cancel')->get();
        $expense_head_list =[''=>'Select Expense Head'] + ExpenseHead::where('status','active')->lists('expense_head_name','id')->all() ;
        $expense_subhead_list =[''=>'Select Expense SubHead'];
        return view('ticketing::expense_details.index', compact('data', 'page_title','expense_head_list','expense_subhead_list', 'disabled'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $page_title = "Add Expense Details";
        $disabled = 'disabled';
        return view('ticketing::expense_details.create', compact('page_title', 'disabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return mixed
     */
    public function store(ExpenseDetailsRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';
        $input['business_type'] = 2 ;  // 2 for ticketing
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            ExpenseDetails::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
           // Session::flash('danger', "Couldn't Save. Please Try Again.");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'View Expense Details Information';
        $data = ExpenseDetails::where('id', $id)->first();
        return view('accounts::expense_details.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Expense Details Information';
        $disabled = '';
        $data = ExpenseDetails::where('id', $id)->first();
        $expense_head_list = [''=>'Select Expense Head'] + ExpenseHead::where('status','active')->lists('expense_head_name','id')->all() ;
        $expense_subhead_list =[''=>'Select Expense SubHead'] + ExpenseSubHead::where('expense_head_id',$data->expense_head_id)->where('status','active')->lists('expense_subhead_name','id')->all() ;
        return view('ticketing::expense_details.edit', compact('data', 'pageTitle','expense_head_list','expense_subhead_list','disabled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseDetailsRequest $request, $id)
    {
        $model = ExpenseDetails::where('id', $id)->first();
        $input = $request->all();
        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
            return redirect()->back();
        } catch (Exception $e) {
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', "Invalid Request. Please Try Again");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $model = ExpenseDetails::findOrFail($id);
        DB::beginTransaction();
        try {
            $model->status = 'inactive';
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            //Session::flash('danger',$e->getMessage());
            Session::flash('danger', "Couldn't Delete. Please Try Again.");
        }
        return redirect()->back();
    }

    public function get_expense_subhead_by_headid($expense_id){
        $str = '<option value="">Select Expense SubHead</option>';
        if(!empty($expense_id)){
                $data = ExpenseSubHead::where('status','active')->where('expense_head_id',$expense_id)->get();
            foreach ($data as $d) {
                $str .= '<option value="'.$d->id.'">'.$d->expense_subhead_name.'</option>' ;
            }
        }
        return $str ;
    }
}