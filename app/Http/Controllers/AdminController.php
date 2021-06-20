<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Company;
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
}
