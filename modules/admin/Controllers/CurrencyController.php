<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 11:54 AM
 */

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Modules\Admin\Models\Currency;
use Modules\Admin\Requests\CurrencyRequest;
use DB;
use Session;
use Input;


class CurrencyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Currency Information";
        $disabled = 'disabled';
        $data = Currency::orderBy('id', 'DESC')->get();
        return view('admin::currency.index', compact('data', 'pageTitle', 'disabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {

        $input = $request->all();
        // dd($input);die;
        $input['status'] = 'active';
        $currency_name = trim($input['name']);
        $get_currency = Currency::where('name',$currency_name)->get();
        if(count($get_currency)){
            return 1 ;
        }

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            Currency::create($input);
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //print_r($id);exit;
        $pageTitle = 'View Currency Information';
        $data = Currency::where('id', $id)->first();
        return view('admin::currency.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $pageTitle = 'Update Currency Information';
        $disabled = '';
        $data = Currency::where('id', $id)->first();
        return view('admin::currency.edit', compact('data', 'pageTitle', 'disabled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, $id)
    {
        $model = Currency::where('id', $id)->first();
        $input = $request->all();
        $currency_name = trim($input['name']);

        $get_currency = Currency::where('id','!=',$id)->where('name',$currency_name)->get();
        if(count($get_currency)){
            return 1 ;
        }

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
        } catch (Exception $e) {
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', "Invalid Request. Please Try Again");
        }
        return $input;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $model = Currency::findOrFail($id);

        DB::beginTransaction();
        try {
            $model->status = 'inactive';
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', "Invalid Request. Please Try Again");
        }
        return redirect()->back();
    }
}