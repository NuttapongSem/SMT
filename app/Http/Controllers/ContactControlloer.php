<?php

namespace App\Http\Controllers;

use App\Models\Models\Fingerprint;
use Illuminate\Http\Request;

class ContactControlloer extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {dd('1235');
    return view('contact.index');
    
    }
    public function index()
    {
        $data = Fingerprint::get();

    foreach ($data as $value) {
      $value['imgPathFingerprint'] = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $value->fingerprint;
      $value['imgPathProFile'] = 'http://127.0.0.1:8000/storage/uploads/image-Porfile/' . $value->imguser;
    }
    // event(new DataUpdate($data));

    return view('contact.index',$data);
    }
}
