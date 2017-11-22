<?php

namespace Modules\Admin\Controllers;

use DB;
use Modules\Admin\Models\Airlines;
use Session;
use Modules\Ticketing\Requests\AirlinesRequest ;
use Modules\Admin\Models\Country;
use App\Http\Controllers\Controller;

class AirlinesController extends Controller
{

    public function index()
    {

        $page_title = "Airlines Information";
        //$title = Input::get('title');
        $disabled = 'disabled';
        $data = Airlines::where('status', '!=', 'cancel')->get();
        $country_list =[''=>'Select Country'] + Country::where('status','active')->lists('country_name','id')->all();

        return view('admin::airlines_information.index', compact('data','country_list', 'page_title', 'disabled'));
    }

    public function create()
    {
        $page_title = "Add Airlines Information";
        $disabled = 'disabled';
        return view('admin::airlines_information.create', compact('page_title', 'disabled'));
    }

    public function store(AirlinesRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';
        $airline_name = trim($input['airlines_name']);

        $get_airlines = Airlines::where('airlines_name',$airline_name)->get();

         if(count($get_airlines)){
             return 1 ;
         }

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            Airlines::create($input);
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
        $pageTitle = 'View Airline Information';
        $data = Airlines::where('id', $id)->first();

        return view('admin::airlines_information.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Airlines Information';
        $disabled = '';
        $data = Airlines::where('id', $id)->first();
        $country_list =[''=>'Select Country'] + Country::where('status','active')->lists('country_name','id')->all();
        return view('admin::airlines_information.edit', compact('data','country_list', 'pageTitle', 'disabled'));
    }

    public function update(AirlinesRequest $request, $id)
    {
        $model = Airlines::where('id', $id)->first();
        $input = $request->all();
        $airline_name = trim($input['airlines_name']);

        $get_airlines = Airlines::where('id','!=',$id)->where('airlines_name',$airline_name)->get();

        if(count($get_airlines)){
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
        $model = Airlines::findOrFail($id);

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
            Session::flash('danger', "Couldn't Delete Successfully. Please Try Again.");
        }

        return redirect()->back();
    }

}