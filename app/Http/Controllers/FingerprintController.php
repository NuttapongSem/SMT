<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Fingerprint as ModelsFingerprint;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FingerprintController extends Controller
{
  public function save(Request $request)
  {

    if ($request->hasFile('imguser')) {

      $filename = $request->file('imguser'); // Set variable
      $nameFile = rand() . '.' . $filename->getClientOriginalExtension();

      $folderPath = './public/uploads/image-Porfile/';
      // Save image to Storage
      Storage::disk('local')->put($folderPath . $nameFile, file_get_contents($filename));
    } else {
      return \response()->json(['message' => 'imguser not found!'], 404);
    }


    if ($request->hasFile('fingerprint')) {

      $filenamefingerprint = $request->file('fingerprint'); // Set variable
      $nameFilefingerprint = rand() . '.' . $filenamefingerprint->getClientOriginalExtension();

      $folderPathfingerprint = './public/uploads/image-fingerprint/';
      // Save image to Storage
      Storage::disk('local')->put($folderPathfingerprint . $nameFilefingerprint, file_get_contents($filenamefingerprint));
    } else {
      return \response()->json(['message' => 'fingerprint not found!'], 404);
    }


    $data = new ModelsFingerprint();
    $data->name =  $request->name;
    $data->age =  intval($request->age);
    $data->interest = $request->interest;
    $data->imguser =  $nameFile;
    $data->fingerprint = $nameFilefingerprint;
    // dd($data->toArray());
    $data->save();




    $urlfingerprint = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $nameFilefingerprint;
    $nameurlFile = 'http://127.0.0.1:8000/storage/uploads/image-Porfile/' . $nameFile;


    return response()->json(['urlfingerprint' => $urlfingerprint, 'nameurlFile' => $nameurlFile], 200);
  }

  public function getData()
  {
    $data = ModelsFingerprint::get();

    foreach ($data as $value) {
      $value['imgPathFingerprint'] = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $value->fingerprint;
      $value['imgPathProFile'] = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $value->imguser;
    }
    return response()->json($data, 200);
  

  }
}
