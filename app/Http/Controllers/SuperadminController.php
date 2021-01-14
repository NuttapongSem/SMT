<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuperadminController extends Controller
{

    protected function login(Request $request)
    {
        $auth = User::where("email", $request->email)->where("password", $request->password)->first();

        if ($auth) {
            Auth::login($auth);
            $auth->update(["type"=>1]);
            Session::flash("save", "เข้าสู่ระบบเรียบร้อย");
            return redirect('/');
            
        }else {
            Session::flash("error", "ผิดมึงดูดีๆๆ!!เว้ย");
           return redirect()->back()->withInput();
        }
    

    }
    protected function logout(Request $request)
    {
        
        $auth = User::where("email",  Auth::user()->email)->first();

        if ($auth) {
            Auth::logout($auth);
            $auth->update(["type"=>0]);
            Session::flash("save", "ไปดีๆนะ");
            return view('login');
            
        }else {
            Session::flash("error", "อย่าพึ่งออกนะ");
           return redirect()->back()->withInput();
        }
    

    }
}
