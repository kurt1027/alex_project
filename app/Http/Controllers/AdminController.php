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
        $companies_count = User::where([
            ['role','Company'],
            ['status',1]
        ])->count();

        return view('admins.dashboard',compact(
            'companies_count'
        ));
    }
    public function showCompanies()
    {
        return view('admins.companies.index');
    }
    public function ajaxDataTablesCompanies()
    {
        $data = User::where([
            ['role','Company'],
            ['status',1]
        ])
        ->get();
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
    public function showEditCompany(Request $request, $id)
    {
        $company = User::find($id);
        
        return view('admins.companies.edit', compact(
            'company'
        ));
    }

    public function doEditCompany(Request $request)
    {
        $rules = [
            'companyName'=>'required',
            'emailAdd'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $company = User::find($request->id);

            $company->name = $request->companyName;
            $company->email = $request->emailAdd;
            if ($company->password) {
                $company->password = bcrypt($request->password);
            }
            
            if ($request->uploadLogo) {
                $imageName = time() . '.' . $request->uploadLogo->extension();
            
                $request->uploadLogo->move('system/files/UploadedBusinesses', $imageName);
                $company->logo = 'system/files/UploadedBusinesses/' . $imageName;
            }
            $company->role = 'Company';
            $company->status = 1;

            $company->save();

            $request->session()->flash('success', 'You have successfully added a Company.');

            return redirect('admin/companies');
        }
    }
    public function doDeleteCompany($id)
    {
            $company = User::find($id);

            $company->status = 0;

            $company->save();

            $request->session()->flash('success', 'You have successfully deleted a Company.');

            return redirect('admin/companies');
    }
}
