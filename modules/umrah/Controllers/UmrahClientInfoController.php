<?php

namespace Modules\Umrah\Controllers;

use DB;
use Session;
use App\Http\Controllers\Controller;
use Modules\Umrah\Models\UmrahClientInfo;
use Modules\Umrah\Requests\UmrahClientInfoRequest;

class UmrahClientInfoController extends Controller
{

    public function index()
    {

        $page_title = "Umrah Client Informations";
        //$title = Input::get('title');
        $disabled = 'disabled';

        $data = UmrahClientInfo::where('status', '!=', 'cancel')->orderBy('id', 'DESC')->get();
        //dd($data);

        return view('umrah::umrah-client-info.index', compact('data', 'page_title', 'disabled'));
    }

    public function create()
    {
        $page_title = "Add Umrah Client";
        $disabled = 'disabled';

        return view('umrah::umrah-client-info.create', compact('page_title', 'disabled'));
    }

    public function store(UmrahClientInfoRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';
        //dd($input);

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            UmrahClientInfo::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            //Session::flash('danger', $e->getMessage());
            Session::flash('danger', "Couldn't Save. Please Try Again.");
            //dd($e->getMessage());
        }

        return redirect()->back();
    }

    public function show($id)
    {
        //print_r($id);exit;
        $pageTitle = 'View Umrah Client Information';
        $data = UmrahClientInfo::where('id', $id)->first();

        return view('umrah::umrah-client-info.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Umrah Client Information';
        $disabled = '';
        $data = UmrahClientInfo::where('id', $id)->first();

        return view('umrah::umrah-client-info.edit', compact('data', 'pageTitle', 'disabled'));
    }

    public function update(UmrahClientInfoRequest $request, $id)
    {
        $model = UmrahClientInfo::where('id', $id)->first();
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
            Session::flash('error', "Coundn't update. Please Try Again");
        }

        return redirect()->back();
    }


    public function receive($id)
    {
        $pageTitle = 'Receive Umrah Client Information';
        $disabled = 'disabled';
        $data = UmrahClientInfo::where('id', $id)->first();
        $previousReceive = $data->relUmrahClientPaymentReceive->sum('receive_amount');

        return view('umrah::umrah-client-info.receive', compact('data', 'previousReceive', 'pageTitle', 'disabled'));
    }

    public function storeReceive(UmrahClientInfoRequest $request, $id)
    {
        $model = UmrahClientInfo::where('id', $id)->first();
        $input = $request->only(['receive_amount', 'receive_date']);
        //dd($input);

        DB::beginTransaction();
        try {
            $model->relUmrahClientPaymentReceive()->create($input);
            DB::commit();
            Session::flash('message', "Successfully Payment Received");

            return redirect()->back();
        } catch (Exception $e) {
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('error', "Couldn't Received payment. Please Try Again");
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $model = UmrahClientInfo::findOrFail($id);

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
            Session::flash('danger', "Couldn't Delete, Please Try Again.");
        }

        return redirect()->back();
    }

}