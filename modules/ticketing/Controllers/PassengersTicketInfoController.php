<?php

namespace Modules\Ticketing\Controllers;

use DB;
use Session;
use Modules\Admin\Models\Airlines;
use App\Http\Controllers\Controller;
use Modules\Ticketing\Models\PassengersTicketInfo;
use Modules\Ticketing\Requests\PassengersTicketInfoRequest;

class PassengersTicketInfoController extends Controller
{

    public function index()
    {
        $page_title = "Passengers Ticket Informations";
        $disabled = 'disabled';
        $data = PassengersTicketInfo::where('status', '!=', 'cancel')->orderBy('id', 'DESC')->get();
        return view('ticketing::passengers-ticket-info.index', compact('data', 'page_title', 'disabled'));
    }

    public function create()
    {
        $page_title = "Add Passenger Ticket Information";
        $disabled = 'disabled';
        $airlines = ['' => 'Select airlines'] + Airlines::where('status', '!=', 'inactive')->lists('airlines_name', 'id')->toArray();

        return view('ticketing::passengers-ticket-info.create', compact('page_title', 'disabled', 'airlines'));
    }

    public function store(PassengersTicketInfoRequest $request)
    {
        //dd($request->all());
        $inputMaster = $request->only(
            'airlines_id',
            'passenger_name',
            'ticket_number',
            'issue_date',
            'flying_date',
            'root_type',
            'root_from',
            'root_to',
            'basic_fair',
            'tax_amount',
            'ait_amount',
            'selling_price',
            'commission',
            'reference',
            'notes'
        );
        //$inputMaster['business_type'] = 1;
        $inputMaster['status'] = 'active';
        //dd($inputMaster);

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            PassengersTicketInfo::create($inputMaster);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            //dd( $e );
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            //Session::flash('danger', "Couldn't Save, Please Try Again.");
        }

        return redirect(route('passengers-ticket-info'));
    }

    public function show($id)
    {
        $page_title = 'View Passenger Ticket Information';
        $data = PassengersTicketInfo::where('id', $id)->first();

        return view('ticketing::passengers-ticket-info.view', ['data' => $data, 'page_title' => $page_title]);
    }

    public function edit($id)
    {
        $page_title = 'Update Order Informations';
        $disabled = '';
        $airlines = ['' => 'Select airlines', '1' => 'Bangladesh Biman'];
        $data = PassengersTicketInfo::where('id', $id)->first();

        return view('ticketing::passengers-ticket-info.edit', compact('page_title', 'disabled', 'airlines', 'data'));
    }

    public function update(PassengersTicketInfoRequest $request, $id)
    {
        //dd( $request->all() );
        $model = PassengersTicketInfo::findOrFail($id);
        $inputMaster = $request->only(
            'airlines_id',
            'passenger_name',
            'ticket_number',
            'issue_date',
            'flying_date',
            'root_type',
            'root_from',
            'root_to',
            'basic_fair',
            'tax_amount',
            'ait_amount',
            'selling_price',
            'commission',
            'reference',
            'notes'
        );
        $inputMaster['status'] = $request->status;
        //dd($inputMaster);

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            $model->update($inputMaster);
            DB::commit();
            Session::flash('message', 'Successfully updated!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            //dd( $e );
            DB::rollback();
            Session::flash('danger', $e->getMessage());
            //Session::flash('danger', "Couldn't update. Please Try Again.");
        }

        return redirect(route('passengers-ticket-info'));
    }

    public function delete($id)
    {
        $model = PassengersTicketInfo::findOrFail($id);
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