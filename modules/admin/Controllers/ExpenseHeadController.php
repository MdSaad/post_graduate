<?php

namespace Modules\Admin\Controllers;

use DB;
use Modules\Admin\Models\ExpenseHead;
use Session;
use Modules\Admin\Requests;
use App\Http\Controllers\Controller;

class ExpenseHeadController extends Controller
{

    public function index()
    {

        $page_title = "Expense Head Informations";
        //$title = Input::get('title');
        $disabled = 'disabled';
        $data = ExpenseHead::where('status', '!=', 'cancel')->get();
        return view('admin::expense_head.index', compact('data', 'page_title', 'disabled'));
    }

    public function create()
    {
        $page_title = "Add Expense Head";
        $disabled = 'disabled';
        return view('admin::expense_head.create', compact('page_title', 'disabled'));
    }

    public function store(Requests\ExpenseHeadRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';
        $head_name = trim($input['expense_head_name']);
        $get_expense_head = ExpenseHead::where('expense_head_name',$head_name)->get();
        if(count($get_expense_head) > 0){
            return 1 ;
        }
        $lastId = ExpenseHead::where('status','active')->max('id');
        $input['expense_code'] = date('Ym').str_pad($lastId + 1,5,0,STR_PAD_LEFT);
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            ExpenseHead::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            //Session::flash('danger', $e->getMessage());
            Session::flash('danger', "Couldn't Save. Please Try Again.");
            //dd($e->getMessage());
        }
        return $input;
    }

    public function show($id)
    {
        //print_r($id);exit;
        $pageTitle = 'View Expense Head Information';
        $data = ExpenseHead::where('id', $id)->first();
        return view('admin::expense_head.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Expense Head Information';
        $disabled = '';
        $data = ExpenseHead::where('id', $id)->first();
        return view('admin::expense_head.edit', compact('data', 'pageTitle', 'disabled'));
    }

    public function update(Requests\ExpenseHeadRequest $request, $id)
    {
        $model = ExpenseHead::where('id', $id)->first();
        $input = $request->all();
        $head_name = trim($input['expense_head_name']);
        $get_expense_head = ExpenseHead::where('id','!=',$id)->where('expense_head_name',$head_name)->get();
        if(count($get_expense_head) > 0){
            return 1 ;
        }
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
        return $input;
    }

    public function delete($id)
    {
        $model = ExpenseHead::findOrFail($id);

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

}