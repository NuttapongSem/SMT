<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function show()
    {
        // dd('1111111111111111');
    }

    public function saveUser(Request $request) {
        dd();
        $request->name;
        $request->email;
    }
}
