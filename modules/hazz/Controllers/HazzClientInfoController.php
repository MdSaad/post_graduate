<?php

namespace Modules\Hazz\Controllers;

use DB;
use Session;
use App\Http\Controllers\Controller;
use Modules\Hazz\Models\HazzClientInfo;
use Modules\Hazz\Requests\HazzClientInfoRequest;

class HazzClientInfoController extends Controller
{

    public function index()
    {

        $page_title = "Hazz Client Informations";
        //$title = Input::get('title');
        $disabled = 'disabled';

        $data = HazzClientInfo::where('status', '!=', 'cancel')->orderBy('id', 'DESC')->get();
        //dd($data);

        return view('hazz::hazz-client-info.index', compact('data', 'page_title', 'disabled'));
    }

    public function create()
    {
        $page_title = "Add Hazz Client";
        $disabled = 'disabled';

        return view('hazz::hazz-client-info.create', compact('page_title', 'disabled'));
    }

    public function store(HazzClientInfoRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';
        //dd($input);

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            HazzClientInfo::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            //Session::flash('danger', "Couldn't Save. Please Try Again.");
            //dd($e->getMessage());
        }

        return redirect()->back();
    }

    public function show($id)
    {
        //print_r($id);exit;
        $pageTitle = 'View Hazz Client Information';
        $data = HazzClientInfo::where('id', $id)->first();

        return view('hazz::hazz-client-info.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Hazz Client Information';
        $disabled = '';
        $data = HazzClientInfo::where('id', $id)->first();

        return view('hazz::hazz-client-info.edit', compact('data', 'pageTitle', 'disabled'));
    }

    public function update(HazzClientInfoRequest $request, $id)
    {
        $model = HazzClientInfo::where('id', $id)->first();
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
        $pageTitle = 'Receive Hazz Client Information';
        $disabled = 'disabled';
        $data = HazzClientInfo::where('id', $id)->first();
        $previousReceive = $data->relHazzClientPaymentReceive->sum('receive_amount');

        return view('hazz::hazz-client-info.receive', compact('data', 'previousReceive', 'pageTitle', 'disabled'));
    }

    public function storeReceive(HazzClientInfoRequest $request, $id)
    {
        $model = HazzClientInfo::where('id', $id)->first();
        $input = $request->only(['receive_amount', 'receive_date']);
        //dd($input);

        DB::beginTransaction();
        try {
            $model->relHazzClientPaymentReceive()->create($input);
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
        $model = HazzClientInfo::findOrFail($id);

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