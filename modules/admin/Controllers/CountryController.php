<?php

namespace Modules\Admin\Controllers;

use DB;
use Session;
use Modules\Admin\Requests\CountryRequest;
use Modules\Admin\Models\Country;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{

    public function index()
    {

        $page_title = "Country Information";
        //$title = Input::get('title');
        $disabled = 'disabled';

        $data = Country::where('status', '!=', 'cancel')->orderBy('country_name', 'ASC')->get();

        return view('admin::country.index', compact('data', 'page_title', 'disabled'));
    }

    public function create()
    {
        $page_title = "Add Country";
        $disabled = 'disabled';

        return view('admin::country.create', compact('page_title', 'disabled'));
    }

    public function store(CountryRequest $request)
    {
        $input = $request->all();
        $input['status'] = 'active';

        $country_name = trim($input['country_name']);

        $get_country = Country::where('country_name',$country_name)->get();

        if(count($get_country)){
            return 1 ;
        }

        //dd($input);

        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            Country::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            //Session::flash('danger', $e->getMessage());
            Session::flash('danger', "Couldn't Save Successfully. Please Try Again.");
            //dd($e->getMessage());
        }

        return $input;
    }

    public function show($id)
    {
        //print_r($id);exit;
        $pageTitle = 'View Country Informations';
        $data = Country::where('id', $id)->first();

        return view('admin::country.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Country Information';
        $disabled = '';
        $data = Country::where('id', $id)->first();

        return view('admin::country.edit', compact('data', 'pageTitle', 'disabled'));
    }

    public function update(CountryRequest $request, $id)
    {
        $model = Country::where('id', $id)->first();
        $input = $request->all();

        $country_name = trim($input['country_name']);

        $get_country = Country::where('id','!=',$id)->where('country_name',$country_name)->get();

        if(count($get_country)){
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
        $model = Country::findOrFail($id);

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