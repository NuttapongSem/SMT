<?php

namespace App\Http\Controllers;

use App\Events\DataUpdate;
use App\Models\Models\Date;
use Illuminate\Http\Request;
use App\Models\Models\Fingerprint as ModelsFingerprint;
use App\Models\Models\Video;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class FingerprintController extends Controller
{

  //  if ($request->hasFile('imguser')) {

  //       $filename = $request->file('imguser'); // Set variable

  //       $nameFile = rand() . '.' . $filename->getClientOriginalExtension();

  //       $folderPath = './public/uploads/image-Porfile/';
  //       // Save image to Storage
  //       Storage::disk('local')->put($folderPath . $nameFile, file_get_contents($filename));
  //     } else {
  //       event(new DataUpdate("1"));

  //       return \response()->json(['message' => 'imguser not found!'], 404);
  //     }


  //     if ($request->hasFile('fingerprint')) {
  //       $filenamefingerprint = $request->file('fingerprint'); // Set variable
  //       $nameFilefingerprint = rand() . '.' . $filenamefingerprint->getClientOriginalExtension();

  //       $folderPathfingerprint = './public/uploads/image-fingerprint/';
  //       // Save image to Storage
  //       Storage::disk('local')->put($folderPathfingerprint . $nameFilefingerprint, file_get_contents($filenamefingerprint));
  //     } else {
  //       
  //       event(new DataUpdate("2"));

  //       return \response()->json(['message' => 'fingerprint not found!'], 404);
  //     }

  public function saveFinger(Request $request)
  {
    //   $validated = $request->validate([
    //     'name' => 'unique:fingerprint'
    // ]);
    $check = ModelsFingerprint::where('name', $request->name)->first();
    if ($check) {
      Session::flash("error", "มันช้ำเว้ย");


      return redirect()->back()->withInput();
    }
    $data = new ModelsFingerprint();
    $data->name =  $request->name;
    $data->age =  intval($request->age);
    $data->interest = $request->interest;
    $data->imguser = $request->imguser;
    $data->save();
    Session::flash("save", "เสร็จเเลัวเว้ย");


    return redirect('/');
  }






  public function save(Request $request)
  {
    $save_image = new ModelsFingerprint();
    $data_name = $request->name;
    $data_age = intval($request->age);
    $data_interest = $request->interest;
    $data_fingerprint = $request->fingerprint;
    $data_imguser = $request->imguser;

    if ($data_fingerprint && $data_imguser) {
      $save_image->name = $data_name;
      $save_image->age = $data_age;
      $save_image->interest = $data_interest;
      $save_image->fingerprint = $data_fingerprint;
      $save_image->imguser = $data_imguser;
      $save_image->save();
      return response()->json([
        'status' => "success"
      ], 200);
    } else {
      return \response()->json(['message' => 'imguser not found!'], 400);
    }
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
  public function date(Request $request)
  {
    $date_save = new Date();

    $now_date = Carbon::now();
    $date_save->fingerprint_id = $request->id;
    $date_save->date =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date, '+7')->format('d-m-Y'));
    $date_save->time =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date)->format('H:i'));
    $date_save->status = $request->status;

    $date_save->save();

    return response()->json($now_date, 200);
  }
  //public function status(Request $request)
  //{
  //$data = Date::where("id", $request->id)->orderByDesc("updated_at")->get();

  //if ($data[0]->status === "เข้า") {
  //$date_save = new Date();
  //$now_date = Carbon::now();
  //$date_save->id = $request->id;
  //$date_save->date =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date, '+7')->format('d-m-Y'));
  //$date_save->time =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date)->format('H:i'));
  //$date_save->status = "ออก";
  //$date_save->save();
  //return response()->json(['text'=> "เลิกงานเเลัวเว้ย !!", "status"=>"ออก"], 200);
  //} else {
  //$date_save = new Date();
  //$now_date = Carbon::now();
  //$date_save->id = $request->id;
  //$date_save->date =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date, '+7')->format('d-m-Y'));
  //$date_save->time =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date)->format('H:i'));
  //$date_save->status = "เข้า";
  //$date_save->save();
  //return response()->json(['text'=> "ยินดีต้อนรับเข้าสู่นรก !!", "status"=>"เข้า"], 200);
  //}
  //}
  public function allData(Request $request)
  {
    $fingerpint_data = ModelsFingerprint::get();
    $date_data = Date::get();
    $video_data = Video::get();
    return response()->json([
      "finger_data" => $fingerpint_data,
      "date_data" => $date_data,
      "video_data" => $video_data
    ]);
  }



  public function createAdmin(Request $request)
  {

    return view('fingpint.Information');
  }
  public  function saveEdit(Request $request)
  {
    $check = ModelsFingerprint::where('name', $request->name)->first();
    if ($check->name !== $request->name) {
      Session::flash("error", "มันช้ำเว้ย");

      return redirect()->back()->withInput();
    }  
    $query = ModelsFingerprint::where("id", $request->id)->first();
    $query->name =  $request->name;
    $query->age =  intval($request->age);
    $query->interest = $request->interest;
    $query->imguser = 'data:image/jpeg;base64,'.base64_encode(file_get_contents($request->file('imguser')));
    $query->save();
    $data = ModelsFingerprint::get();
    // foreach ($data as $value) {
    //   $value['imgPathFingerprint'] = 'http://127.0.0.1:8001/storage/uploads/image-fingerprint/' . $value->fingerprint;
    //   $value['imgPathProFile'] = 'http://127.0.0.1:8001/storage/uploads/image-Porfile/' . $value->imguser;
    // }
    Session::flash("save", "เเก้ไขเรียบร้อย");

    return redirect('/');
  }



  public function index(Request $request)
  {
    $data = ModelsFingerprint::orderByDesc('created_at')->get();

    // foreach ($data as $value) {
    //   $value['imgPathFingerprint'] = 'http://127.0.0.1:8001/storage/uploads/image-fingerprint/' . $value->fingerprint;
    //   $value['imgPathProFile'] = 'http://127.0.0.1:8001/storage/uploads/image-Porfile/' . $value->imguser;
    // }

    return view('fingpint.index', compact('data'));
  }

  public function edit($id)
  {
    $query = ModelsFingerprint::where("id", $id)->first();

    return view('fingpint.edit', ["data" => $query]);
  }
  public function delete($id)
  {
    $data = ModelsFingerprint::find($id); 
    if (isset($data)) {
      $data->delete();


      // foreach ($data as $value) {

      //   $value['imgPathFingerprint'] = 'http://127.0.0.1:8001/storage/uploads/image-fingerprint/' . $value->fingerprint;
      //   $value['imgPathProFile'] = 'http://127.0.0.1:8001/storage/uploads/image-Porfile/' . $value->imguser;
      // }
      Session::flash("save", "ลบเรียบร้อย");
    } else {
      Session::flash("save", "ไม่พบข้อมูล");
    }
    return redirect('/');
  }
}
