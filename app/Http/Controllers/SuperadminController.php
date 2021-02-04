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
            if ($auth->admin == "superadmin") {
                Auth::login($auth);
                $auth->update(["type" => 1]);
                Session::flash("save", "เข้าสู่ระบบเรียบร้อย");
                return redirect('/');
            } else {
                Session::flash("error", "คุณไม่สิทธิ์เข้าถึง");
                return redirect()->back()->withInput();
            }
        } else {
            Session::flash("error", "ข้อมูลไม่ถูกต้อง");
            return redirect()->back()->withInput();
        }
    }

    public function loginMobile(Request $request)
    {
        $auth = User::where("email", $request->email)->where("password", $request->password)->first();
        if ($auth) {
            if ($auth->admin == "adminmobile" || $auth->admin == "superadmin") {
                Auth::login($auth);
                $auth->update(["type" => 1]);
                Session::flash("save", "เข้าสู่ระบบเรียบร้อย");
                return response()->json($auth, 200);
            } else {
                return response()->json("คุณไม่สิทธิ์เข้าถึง", 400);
            }
        } else {
            return response()->json("ข้อมูลไม่ถูกต้อง", 400);
        }
    }

    protected function logout(Request $request)
    {

        $auth = User::where("email",  Auth::user()->email)->first();

        if ($auth) {
            Auth::logout($auth);
            $auth->update(["type" => 0]);
            Session::flash("save", "ไปดีๆนะ");
            return view('login');
        } else {
            Session::flash("error", "อย่าพึ่งออกนะ");
            return redirect()->back()->withInput();
        }
    }
}
