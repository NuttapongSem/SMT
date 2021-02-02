<?php

namespace App\Http\Controllers;

use App\Events\DataUpdate;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Fingerprint;
use App\Models\Video;
use Attribute;
use Carbon\Carbon;
use Database\Factories\AttendanceFactory;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use stdClass;

class FingerprintController extends Controller
{


  public function saveFinger(Request $request)
  {

    $check = Fingerprint::where('name', $request->name)->first();
    if ($check) {
      Session::flash("error", "มันช้ำเว้ย");

      return redirect()->back()->withInput();
    }
    $data = new Fingerprint();
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
    $save_image = new Fingerprint();
    $data_name = $request->name;
    $data_age = intval($request->age);
    $data_fingerprint = $request->fingerprint;
    $data_imguser = $request->imguser;
    $data_interest = $request->interest;

    $arr = [];
    $arrget = explode(',', $request->interest);
    if ($request->has('interest')) {
      foreach ($arrget as $item) {
        if (end($arrget) != $item) {
          $arr[] = $item;
        }
      }
    }

    if ($data_fingerprint && $data_imguser) {
      $save_image->name = $data_name;
      $save_image->age = $data_age;
      $save_image->interest = json_encode($arr);
      // $save_image->interest = $data_interest ;
      $save_image->fingerprint = $data_fingerprint;
      $save_image->imguser =  $data_imguser;
      $save_image->save();
      return response()->json([
        'status' => "success"
      ], 200);
    } else {
      return response()->json(['message' => 'imguser not found!'], 400);
    }
  }


  public function getData()
  {
    $data = Fingerprint::get();

    return response($data);
  }




  public function searchinterest(Request $request)
  {
    $data = Fingerprint::where('interest', 'like', "%{$request->interest}%")->get('interest');

    return response()->json($data, 200);
  }


  public function attenDance(Request $request)
  {
    $date_save = new Attendance();

    $now_date = Carbon::now();
    $date_save->fingerprint_id = $request->id;
    $date_save->date =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date, '+7')->format('d-m-Y'));
    $date_save->time =  date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date)->format('H:i'));
    $date_save->status = $request->status;
    event(new DataUpdate($request->id));

    $date_save->save();

    return response()->json($now_date, 200);
  }


  public function allData(Request $request)
  {
    $fingerpint_data = Fingerprint::get();
    $date_data = attendance::get();
    $video_data = Video::get();
    return response()->json([
      "finger_data" => $fingerpint_data,
      "date_data" => $date_data,
      "video_data" => $video_data
    ]);
  }


  public  function saveEdit(Request $request)
  {

    $check = Fingerprint::find($request->id);

    if ($check->name !== $request->name) {
      if (Fingerprint::where('name', $request->name)->exists()) {

        Session::flash("error", "มันช้ำเว้ย");

        return redirect()->back()->withInput();
      }
    }
    $query = Fingerprint::where("id", $request->id)->first();
    $query->name =  $request->name;
    $arr = [];

    if ($request->has('interest')) {
      foreach ($request->interest as $item) {
        $arr[] = $item;
      }
    }
    $query->age =  intval($request->age);

    $query->interest = json_encode($arr);

    if ($request->file('imguser'))
      $query->imguser = base64_encode(file_get_contents($request->file('imguser')));
    $query->save();
    $data = Fingerprint::get();

    Session::flash("save", "เเก้ไขเรียบร้อย");

    return redirect('/');
  }



  public function index(Request $request)
  {

    $data = Fingerprint::orderByDesc('created_at')->paginate(10);
    return view('fingpint.index', compact('data'));
  }


  public function edit($id)
  {
    $query = Fingerprint::where("id", $id)->first();


    return view('fingpint.edit', ["data" => $query, 'data_list']);
  }


  public function delete($id)
  {
    $data = Fingerprint::find($id);
    if (isset($data)) {
      $data->delete();



      Session::flash("save", "ลบเรียบร้อย");
    } else {
      Session::flash("save", "ไม่พบข้อมูล");
    }
    return redirect('/');
  }


  public function dataUser(Request $request)
  {
    $name = $request->name;


    $data = Fingerprint::orderByDesc('created_at',)

      ->when($name, function ($query, $name) {
        return $query->where('name', 'like', '%' . $name . '%');
      })

      ->paginate(5)->withQueryString();
    $data->searchName = $name;




    return view('fingpint.datauser', compact('data'));
  }



  public function Checkin(Request $request)
  {

    $name = $request->name;
    $searchDateStart = $request->date_start;
    $searchDateEnd = $request->date_end;
    $timeStart = $request->time_start;
    $timeEnd = $request->time_end;
    $dateStart = '';
    $dateEnd = '';
    // dd($timeStart, $timeEnd);


    if ($searchDateStart) {
      $year = substr($searchDateStart, 0, 4);
      $month = substr($searchDateStart, 5, 2);
      $day = substr($searchDateStart, 8, 2);
      $dateStart = $day . '-' . $month . '-' . $year;
    }

    if ($searchDateEnd) {
      $dateEndyear = substr($searchDateEnd, 0, 4);
      $dateEndmonth = substr($searchDateEnd, 5, 2);
      $dateEndday = substr($searchDateEnd, 8, 2);
      $dateEnd = $dateEndday . '-' .  $dateEndmonth . '-' . $dateEndyear;
    }

    $status = $request->status;

    $data = Attendance::orderByDesc('attendance.updated_at')
      ->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')

      ->when($name, function ($query, $name) {
        // dump('when name');
        return $query->where('name', 'like', '%' . $name . '%');
      })

      ->when($dateStart && $dateEnd === '', function ($query) use ($dateStart) {
        // dump('when date', $datetart);
        return $query->where('date',  $dateStart);
      })

      ->when($dateStart && $dateEnd, function ($query) use ($dateStart, $dateEnd) {

        return $query->whereBetween('date', [$dateStart, $dateEnd]);
      })

      ->when($timeStart && $timeEnd === '', function ($query) use ($timeStart) {
        // dump('when date', $datetart);
        return $query->where('Time',  $timeStart);
      })

      ->when($timeStart && $timeEnd, function ($query) use ($timeStart, $timeEnd) {

        return $query->whereBetween('Time', [$timeStart, $timeEnd]);
      })

      ->when($status, function ($query, $status) {
        // dump('when status');0
        return $query->where('status', $status);
      })

      ->paginate('10')->withQueryString();
    $data->searchName = $name;
    $data->searchdateStart = $dateStart;
    $data->searchdateEnd = $dateEnd;
    $data->searchTimeto = $timeStart;
    $data->searchTimein = $timeEnd;
    $data->searchStatus = $status;

    return view('fingpint.checkin', compact('data'));
  }



  public function chartUser(Request $request)

  {
    $idfinger = Fingerprint::get('id');
    $status = [];
    $xy = [];
    $dataforchart = [];
    $listforname = [];
    $index = 1;
    $date = \Carbon\Carbon::now()->format('d-m-Y');
    foreach ($idfinger as $value) {
      $data = Attendance::where('fingerprint_id', $value["id"])->where('date', $date)->with('fingerprint')->orderBy('updated_at')->get();

      if (sizeof($data) != 0) {
        $start = $data[0];
        $end = $data[sizeof($data) - 1];
        $listforname[$index] = $start->fingerprint->name;
        for ($i = 1; $i <= 3; $i++) {
          if ($i == 1) {
            $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d h:i:s');
            $xy['y'] = $index;
          } else if ($i == 2) {
            $xy['x'] = \Carbon\Carbon::parse($end->date . $end->Time)->format('Y-m-d h:i:s');
            $xy['y'] = $index;
          } else {
            $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d h:i:s');;
            $xy['y'] = null;
          }
          array_push($dataforchart, $xy);
        }
        $index++;
      }
    }
    $status['data'] = $dataforchart;
    $status['name'] = $listforname;
    $status['datenow'] = $date;

    return view('fingpint.chartuser', ["data" => $status]);
  }





  public function getDate(Request $request)

  {
    $idfinger = Fingerprint::get('id');
    $status = [];
    $xy = [];
    $dataforchart = [];
    $listforname = [];
    $index = 1;
    $date = \Carbon\Carbon::parse($request->data)->format('d-m-Y');
    foreach ($idfinger as $value) {
      $data = Attendance::where('fingerprint_id', $value["id"])->where('date', $date)->with('fingerprint')->orderBy('updated_at')->get();

      if (sizeof($data) != 0) {
        $start = $data[0];
        $end = $data[sizeof($data) - 1];
        $listforname[$index] = $start->fingerprint->name;
        for ($i = 1; $i <= 3; $i++) {
          if ($i == 1) {
            $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d h:i:s');
            $xy['y'] = $index;
          } else if ($i == 2) {
            $xy['x'] = \Carbon\Carbon::parse($end->date . $end->Time)->format('Y-m-d h:i:s');
            $xy['y'] = $index;
          } else {
            $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d h:i:s');;
            $xy['y'] = null;
          }
          array_push($dataforchart, $xy);
        }
        $index++;
      }
    }
    $status['data'] = $dataforchart;
    $status['name'] = $listforname;
    $status['datenow'] = $date;
    return response()->json(["data" => $status]);
  }


  public function chartOne($id)
  {

    $dataChart = [];

    $name = Fingerprint::where('id', $id)->get()[0]['name'];
    $attendance = Attendance::where('fingerprint_id', $id)->orderBy('num')->get();
    $firstDate = new DateTime();
    $firstDate->setISODate($firstDate->format('Y'), $firstDate->format('W'));
    $lastDate = new DateTime($attendance[sizeof($attendance) - 1]['date']);
    $lastDate->setISODate($lastDate->format('Y'), $lastDate->format('W'));

    $interval = $lastDate->diff($firstDate);
    for ($i = 0; $i < intval($interval->days / 7) + 1; $i++) {
      $week = [];
      $dto = new DateTime();
      $dto->setISODate($dto->format('Y'), $dto->format('W') - $i);
      $dto->modify('-1 days');

      for ($j = 0; $j <= 7; $j++) {
        $attendance = Attendance::where('date', $dto->format('d-m-Y'))
          ->where('fingerprint_id', $id)
          ->orderBy('num')
          ->get();

        if (sizeof($attendance) != 0) {
          $point['start'] = "2021-01-01 " . $attendance[0]['Time'];
          $point['end'] = "2021-01-01 " . $attendance[sizeof($attendance) - 1]['Time'];
          $point['y'] = date("Y-m-d", strtotime($attendance[0]['date'])) . " 00:00";
          $point['date'] = $attendance[0]['date'];
          $week[] = $point;
        }
        $dto->modify('+1 days');
      }
      $dataChart[] = $week;
    }

    return view('fingpint.chartOne', ['dataChart' => $dataChart, 'name' => $name]);
  }
}


















//เก็บรูปเป็น path
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

  
  
  
  //เช็คทุกรอบที่สเเกน 
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

  
  // public function editData(Request $request)
  // {

  //   $query = ModelsFingerprint::where("id", $request->id)->first();

  //   $query->updated_at = time();
  //   $query->save();
  //   event(new DataUpdate($query->id));

  //   return "success";
  // }
  
   // public function createAdmin(Request $request)
  // {

  //   return view('fingpint.Information');
  // }
