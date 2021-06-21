<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use Mail;
use Artisan;
use DB;
use Schema;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        // return $request->email;
        $rules = [
            'email'=>'required',
            'password'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if (Auth::attempt([
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
            ])) {
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error', 'Looks like you have entered wrong login credentials.');

                return back();
            }
        }
    }

    public function doLogout()
    {
        Auth::logout();

        return redirect('/');
    }
}
