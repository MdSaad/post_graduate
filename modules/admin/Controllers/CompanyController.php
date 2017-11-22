<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 1/25/16
 * Time: 1:45 PM
 */

namespace Modules\Admin\Controllers;

use Illuminate\Support\Facades\File;
use Modules\Admin\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use Modules\Admin\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pageTitle = "Company Information";
        $disabled = 'disabled';
        $data = Company::all();
        return view('admin::company.index', compact('data', 'pageTitle', 'disabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $pageTitle = 'Add Company';
        $disabled = 'disabled';
        return view('admin::company.create', compact('pageTitle', 'disabled'));
    }

    public function store(CompanyRequest $request)
    {
        $input = $request->except('logo');
        $logo = $request->file('logo');
        $input['status'] = 'active';

        $company_name = trim($input['company_name']);

        $get_company = Company::where('company_name',$company_name)->get();
        if(count($get_company)){
            return 1;
        }

        if (!empty($logo)) {
            $rand_num = rand(11111, 99999) . '-';
            $rules = array();
            $validator = Validator::make(array('file' => $logo), $rules);
            if ($validator->passes()) {
                $upload_folder = 'uploads/company/';
                if (!file_exists($upload_folder)) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir($upload_folder, 0777);
                }
                if (isset($logo)) {
                    $file_original_name = $logo->getClientOriginalName();
                    $file_name = $rand_num . $file_original_name;
                    $logo->move($upload_folder, $file_name);
                    $input['logo'] = 'uploads/company/' . $file_name;
                }
            }
        }
        /* Transaction Start Here */
        DB::beginTransaction();
        try {
            Company::create($input);
            DB::commit();
            Session::flash('message', 'Successfully added!');
        } catch (\Exception $e) {
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            // Session::flash('danger', $e->getMessage());
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
        $pageTitle = 'View Company Information';
        $data = Company::where('id', $id)->first();
        return view('admin::company.view', ['data' => $data, 'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Update Company Information';
        $disabled = '';
        $data = Company::where('id', $id)->first();
        return view('admin::company.edit', compact('data', 'pageTitle', 'disabled'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {

        $model = Company::where('id', $id)->first();
        $input = $request->except('logo');

        $company_name = trim($input['company_name']);

        $get_company = Company::where('id','!=',$id)->where('company_name',$company_name)->get();
        if(count($get_company)){
            return 1;
        }

        $logo = $request->file('logo');
        //  return $logo;
        if (!empty($logo)) {
            $rand_num = rand(11111, 99999) . '-';
            $rules = array();
            $validator = Validator::make(array('file' => $logo), $rules);
            if ($validator->passes()) {
                File::delete($model->logo);
                $upload_folder = 'uploads/company/';
                if (!file_exists($upload_folder)) {
                    $oldmask = umask(0);  // helpful when used in linux server
                    mkdir($upload_folder, 0777);
                }
                $file_original_name = $logo->getClientOriginalName();
                $file_name = $rand_num . $file_original_name;
                $logo->move($upload_folder, $file_name);
                $input['logo'] = 'uploads/company/' . $file_name;

            }
        }

        DB::beginTransaction();
        try {
            $model->update($input);
            DB::commit();
            Session::flash('message', "Successfully Updated");
        } catch (Exception $e) {
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            //Session::flash('danger', $e->getMessage());
            Session::flash('danger', "Couldn't Update. Please Try Again.");
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
        $model = Company::findOrFail($id);

        DB::beginTransaction();
        try {
            $model->status = 'inactive';
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully Deleted.");

        } catch (\Exception $e) {
            DB::rollback();
            //Session::flash('danger',$e->getMessage());
            Session::flash('danger', "Couldn't Delete. Please Try Again.");
        }
        return redirect()->back();
    }
}