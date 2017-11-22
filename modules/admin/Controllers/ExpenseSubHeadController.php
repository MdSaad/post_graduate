<?php

namespace Modules\Admin\Controllers;

use DB;
use Modules\Admin\Models\ExpenseHead;
use Modules\Admin\Models\ExpenseSubHead;
use Session;
use Modules\Admin\Requests;
use App\Http\Controllers\Controller;

class ExpenseSubHeadController extends Controller
{

    public function index()
    {
        $page_title = "Expense SubHead Information";
        $disabled = 'disabled';
        $data = ExpenseSubHead::where('status', '!=', 'cancel')->get();
        $expense_head_list = [''=>'Select Expense Head'] + ExpenseHead::where('status','active')->lists('expense_head_name','id')->all();
        return view('admin::expense_subhead.index', compact('data','expense_head_list', 'page_title', 'disabled'));
    }

    public function create()
    {
        $page_title = "Add Expense SubHead";
        $disabled = 'disabled';
        return view('admin::expense_subhead.create', compact('page_title', 'disabled'));
    }

    public function store(Requests\ExpenseSubHeadRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';
        /* Transaction Start Here */

        $head_id = $input['expense_head_id'];
        $subhead_name = $input['expense_subhead_name'];

        $data = ExpenseSubHead::where('expense_head_id',$head_id)->where('expense_subhead_name',$subhead_name)->get();
        if(count($data) > 0){
            return 1 ;
        }else {
            DB::beginTransaction();
            try {
                ExpenseSubHead::create($input);
                DB::commit();
                Session::flash('message', 'Successfully added!');
            } catch (\Exception $e) {
                //If there are any exceptions, rollback the transaction`
                DB::rollback();
                //Session::flash('danger', $e->getMessage());
                Session::flash('danger', "Couldn't Save. Please Try Again.");
            }
            return $input;
        }
    }

    public function show($id)
    {
        //print_r($id);exit;
        $pageTitle = 'View Expense SubHead Information';
        $data = ExpenseSubHead::where('id', $id)->first();
        return view('admin::expense_subhead.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Expense SubHead Information';
        $disabled = '';
        $data = ExpenseSubHead::where('id', $id)->first();
        $expense_head_list = [''=>'Select Expense Head'] + ExpenseHead::where('status','active')->lists('expense_head_name','id')->all();
        return view('admin::expense_subhead.edit', compact('data', 'pageTitle','expense_head_list', 'disabled'));
    }

    public function update(Requests\ExpenseSubHeadRequest $request, $id)
    {
        $model = ExpenseSubHead::where('id', $id)->first();
        $input = $request->all();
        $head_id = $input['expense_head_id'];
        $subhead_name = $input['expense_subhead_name'];

        $data = ExpenseSubHead::where('id','!=',$id)->where('expense_head_id',$head_id)->where('expense_subhead_name',$subhead_name)->get();

        if(count($data) > 0){
            return 1 ;
        }else {
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
            return $model;
        }
    }

    public function delete($id)
    {
        $model = ExpenseSubHead::findOrFail($id);

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

    public function is_exists_subhead($head_id,$subhead_name){
        $data = ExpenseSubHead::where('expense_head_id',$head_id)->where('expense_subhead_name',$subhead_name)->get();
        if(count($data) > 0){
            return 1 ;
        }else{
            return 0 ;
        }
    }

}