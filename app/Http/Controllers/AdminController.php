<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Company;
use App\Models\User;
use DataTables;

use Auth;
use Mail;
use DB;
use Validator;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admins.dashboard');
    }
    public function showCompanies()
    {
        return view('admins.companies.index');
    }
    public function ajaxDataTablesCompanies()
    {
        $data = Company::select('*');
        return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
    }
    public function showAddCompany()
    {
        return view('admins.companies.add');
    }
    public function addCompany(Request $request)
    {
        $rules = [
            'companyName'=>'required',
            'emailAdd'=>'required',
            'password'=>'required',
            'uploadLogo'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $company = new User;

            $company->name = $request->companyName;
            $company->email = $request->emailAdd;
            $company->password = bcrypt($request->password);
            $imageName = time() . '.' . $request->uploadLogo->extension();
            $request->uploadLogo->move('system/files/UploadedBusinesses', $imageName);
            $company->logo = 'system/files/UploadedBusinesses/' . $imageName;
            $company->role = 'Company';
            $company->status = 1;

            $company->save();

            $request->session()->flash('success', 'You have successfully added a Company.');

            return redirect('admin/companies');
        }
    }
}
