<?php

namespace App\Http\Controllers;

use App\Events\DataUpdate;
use Illuminate\Http\Request;
use App\Models\Models\Fingerprint as ModelsFingerprint;
use Carbon\Carbon;
use DateTime;
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
      event(new DataUpdate("1"));

      return \response()->json(['message' => 'imguser not found!'], 404);
    }


    if ($request->hasFile('fingerprint')) {
      $filenamefingerprint = $request->file('fingerprint'); // Set variable
      $nameFilefingerprint = rand() . '.' . $filenamefingerprint->getClientOriginalExtension();

      $folderPathfingerprint = './public/uploads/image-fingerprint/';
      // Save image to Storage
      Storage::disk('local')->put($folderPathfingerprint . $nameFilefingerprint, file_get_contents($filenamefingerprint));
    } else {
      dd(111111);
      event(new DataUpdate("2"));

      return \response()->json(['message' => 'fingerprint not found!'], 404);
    }


    $data = new ModelsFingerprint();
    $data->name =  $request->name;
    $data->age =  intval($request->age);
    $data->interest = $request->interest;
    $data->imguser =  $nameFile;
    $data->fingerprint = $nameFilefingerprint;

    // dd($request);
    $data->save();

    $urlfingerprint = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $nameFilefingerprint;
    $nameurlFile = 'http://127.0.0.1:8000/storage/uploads/image-Porfile/' . $nameFile;


    return response()->json([
      'status' => "success"
    ], 200);
  }

  public function getData()
  {
    $data = ModelsFingerprint::get();

    foreach ($data as $value) {
      $value['imgPathFingerprint'] = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $value->fingerprint;
      $value['imgPathProFile'] = 'http://127.0.0.1:8000/storage/uploads/image-Porfile/' . $value->imguser;
    }
    // event(new DataUpdate($data));

    return response($data);
  }
  public function getDataLastest()
  {
    $data = ModelsFingerprint::orderByDesc("updated_at")->limit(1)->get();
    // $data = ModelsFingerprint::where("id", 7)->first();

    foreach ($data as $value) {
      $value['imgPathFingerprint'] = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $value->fingerprint;
      $value['imgPathProFile'] = 'http://127.0.0.1:8000/storage/uploads/image-Porfile/' . $value->imguser;
    }
    return response()->json($data, 200);
  }

  public function editData(Request $request)
  {
    $query = ModelsFingerprint::where("id", $request->id)->first();
    date_default_timezone_set("Asia/Bangkok");
    $query->updated_at = time();
    $query->save();
    event(new DataUpdate($query->id));
    return "success";
  }

  public function searchinterest(Request $request)
  {
    $data = ModelsFingerprint::where('interest', 'like', "%{$request->interest}%")->get('interest');
    foreach ($data as $value) {

      $value['imgPathFingerprint'] = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $value->fingerprint;
      $value['imgPathProFile'] = 'http://127.0.0.1:8000/storage/uploads/image-Porfile/' . $value->imguser;
    }
    return response()->json($data, 200);
  }
}
