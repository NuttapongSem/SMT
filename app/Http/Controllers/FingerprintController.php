<?php

namespace App\Http\Controllers;

use App\Events\DataUpdate;
use App\Http\Services\LineService;
use App\Models\Attendance;
use App\Models\Consolelog;
use App\Models\Fingerprint;
use App\Models\Group_position;
use App\Models\Job_position;
use App\Models\Leave;
use App\Models\line_regis;
use App\Models\Log_mobile;
use App\Models\secret_infos;
use App\Models\Video;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class FingerprintController extends Controller
{
    public function Line_Noti($message)
    {

        $lineService = new LineService();
        $lineService->sendNotify($message);
    }

    public function save(Request $request)
    {
        try {
            $save_image = new Fingerprint();
            $data_name = $request->name;
            $data_group = $request->group;
            $data_jobposition = $request->jobposition;
            $data_birthday = date('Y-m-d', strtotime($request->birthday));
            $data_fingerprint = $request->fingerprint;
            $data_fingerprintnew = $request->fingerprintnew;
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
                $save_image->interest = json_encode($arr);
                $save_image->birthday = $data_birthday;
                $save_image->fingerprint = $data_fingerprint;
                $save_image->fingerprintnew = $data_fingerprintnew;
                $save_image->imguser = $data_imguser;
                $save_image->group = $data_group;
                $save_image->jobposition = $data_jobposition;
                $save_image->save();
                return response()->json([
                    'status' => "success",
                ], 200);
            } else {
                return response()->json(['message' => 'imguser not found!'], 400);
            }
        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "attenDance";
            $error->message = $e->getMessage();
            $error->save();

            return back()->withError($e->getMessage());
        }
    }

    public function getData()
    {
        $data = Fingerprint::get();

        return response($data);
    }

    public function attenDance(Request $request)
    {
        try {
            $date_save = new Attendance();

            $now_date = Carbon::now();
            $date_save->fingerprint_id = $request->id;
            $date_save->date = date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date, '+7')->format('d-m-Y'));
            $date_save->time = date(Carbon::createFromFormat('Y-m-d H:i:s', $now_date)->format('H:i'));
            $date_save->status = $request->status;
            $dateFormat = $this->DateThai($date_save->date, "dateEng");

            event(new DataUpdate($request->id));
            $idgroup = Fingerprint::where('id', $request->id)->first();
            $idgroup->touch();
            $datetiming = Attendance::where("date", $date_save->date)->where("fingerprint_id", $request->id)->first();
            if ($datetiming == null) {
                if ($idgroup->group == 12) {
                    if (($date_save->time > date(Carbon::createFromFormat('H:i', '9:00')->format('H:i'))) && $request->status == "เข้า") {
                        $date_save->late = "สายเเลัวจ้า";
                        $message = "\n" . "ชื่อ:" . " " . $idgroup->name . "\n" . "กลุ่ม:" . " " . $idgroup->nameposition() . "\nสถานะ: สาย " . "\nวันที่:" . $dateFormat . " " . "\nเวลา:" . $date_save->time;
                        $this->Line_Noti($message);
                    }
                    if (($date_save->time < date(Carbon::createFromFormat('H:i', '9:00')->format('H:i'))) && $request->status == "เข้า") {
                        $date_save->late = "ตรงต่อเวลาจ้า";
                    }
                } else {

                    if (($date_save->time > date(Carbon::createFromFormat('H:i', '9:15')->format('H:i'))) && $request->status == "เข้า") {
                        $date_save->late = "สายเเลัวจ้า";
                        $message = "\n" . "ชื่อ:" . " " . $idgroup->name . "\n" . "กลุ่ม:" . " " . $idgroup->nameposition() . "\nสถานะ: สาย " . "\nวันที่:" . $dateFormat . " " . "\nเวลา:" . $date_save->time;
                        $this->Line_Noti($message);
                    }
                    if (($date_save->time < date(Carbon::createFromFormat('H:i', '9:15')->format('H:i'))) && $request->status == "เข้า") {
                        $date_save->late = "ตรงต่อเวลาจ้า";
                    }

                }
            }
            if (($date_save->time < date(Carbon::createFromFormat('H:i', '18:00')->format('H:i'))) && $request->status == "ออก") {
                $date_save->late = "ออกก่อนเวลา";
                $message = "\n" . "ชื่อ:" . " " . $idgroup->name . "\n" . "กลุ่ม:" . " " . $idgroup->nameposition() . "\nสถานะ: ออกก่อนเวลา " . "\nวันที่:" . $dateFormat . " " . "\nเวลา:" . $date_save->time;
                $this->Line_Noti($message);
            }

            $date_save->save();

            if ($date_save->late == "สายเเลัวจ้า") {

                $res = (object) array('id' => 0, "date" => 0, "time" => 0, "status" => 1);

                return response()->json($res, 200);
            }
            if ($date_save->late == "ออกก่อนเวลา") {

                $res = (object) array('id' => 0, "date" => 0, "time" => 0, "status" => 2);

                return response()->json($res, 200);
            }

            $res = (object) array('id' => 0, "date" => 0, "time" => 0, "status" => 0);
            if ($date_save->status == 'ออก') {
                $res = (object) array('id' => 0, "date" => 0, "time" => 0, "status" => 3);
            }
            return response()->json($res, 200);

        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "attenDance";
            $error->message = $e->getMessage();
            $error->save();
            return back()->withError($e->getMessage());
        }
    }

    public function saveLogmobile(request $request)
    {

        $save_error = new Log_mobile();

        $save_error->screen = $request->screen;
        $save_error->function = $request->function;
        $save_error->message = $request->message;
        $save_error->save();
    }

    public function allData(Request $request)
    {
        $fingerpint_data = Fingerprint::get();
        $date_data = attendance::get();
        $video_data = Video::get();
        return response()->json([
            "finger_data" => $fingerpint_data,
            "date_data" => $date_data,
            "video_data" => $video_data,
        ]);
    }

    public function saveEdit(Request $request)
    {
        try {

            $check = Fingerprint::find($request->id);

            if ($check->name !== $request->name) {
                if (Fingerprint::where('name', $request->name)->exists()) {

                    Session::flash("error", "มันช้ำเว้ย");

                    return redirect()->back()->withInput();
                }
            }
            $query = Fingerprint::where("id", $request->id)->first();
            $query->name = $request->name;
            $birthday = \Carbon\Carbon::make($request->birthday)->format('Y-m-d');
            // dd($birthday);
            // $birthday = \Carbon\Carbon::createFromFormat('Y-m-d', $this->birthday, '+7')->addYear(543)->format('d-m-Y');
            // $birthday = $this->DateThai($birthday, "date");

            $query->birthday = $birthday;

            $arr = [];

            if ($request->has('interest')) {
                foreach ($request->interest as $item) {
                    $arr[] = $item;
                }
            }
            // $query->age =  intval($request->age);
            $query->interest = json_encode($arr);
            $query->group = $request->group;
            $query->jobposition = $request->jobposition;

            if ($request->file('imguser')) {
                $query->imguser = base64_encode(file_get_contents($request->file('imguser')));
            }

            $query->save();
            $data = Fingerprint::get();

            Session::flash("save", "เเก้ไขเรียบร้อย");
            return redirect('/datauser');
        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "saveEdit";
            $error->message = $e->getMessage();
            $error->save();

            return back()->withError($e->getMessage());
        }
    }

    public function index(Request $request)
    {

        $data = Fingerprint::with('leave')->with('attendance', function ($q) {
            $q->whereDate('updated_at', Carbon::today());
        })->orderByDesc('updated_at')->paginate(10);

        foreach ($data as $item) {
            if (count($item->attendance) > 0) {
                switch ($item["group"]) {
                    case 12:
                        if ($item->attendance->first()->Time > date(Carbon::createFromFormat('H:i', '9:30')->format('H:i')) && $item->attendance->first()->status == "เข้า") {
                            $item->data_late = "มาสาย";
                        } else {
                            $item->no_late = "ไม่สาย";
                        }
                        break;

                    default:
                        if ($item->attendance->first()->Time > date(Carbon::createFromFormat('H:i', '9:15')->format('H:i')) && $item->attendance->first()->status == "เข้า") {
                            $item->data_late = "มาสาย";
                        } else {
                            $item->no_late = "ไม่สาย";
                        }
                        if ($item->attendance->first()->Time < date(Carbon::createFromFormat('H:i', '18:00')->format('H:i')) && $item->attendance->first()->status == "ออก") {
                            $item->data_late = "ออกก่อนเวลา";
                        }
                }
            }

            if ($item->leave->count() > 0) {
                $item->leaveStatus = "ข้อมูลการลา";
            } else {
                $item->leaveStatus = null;
            }
        }
        if (Session::has('urlPDF')) {
            Session::flash('urlPDF', Session::get('urlPDF'));
        } else {
            Session::flash('urlPDF', null);
        }
        return view('fingpint.index', compact(['data']));
    }

    public function edit($id)
    {
        try {

            $query = Fingerprint::where("id", $id)->first();
            $position = Group_position::with('job_position')->get();

            $jobs = Job_position::where("id_group", $query->group)->get();
            return view('fingpint.edit', ["data" => $query, 'data_list', 'position' => $position, "jobs" => $jobs]);
        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "attenDance";
            $error->message = $e->getMessage();
            $error->save();

            return back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = Fingerprint::find($id);
            if (isset($data)) {
                $data->delete();
                Session::flash("save", "ลบเรียบร้อย");
            } else {
                Session::flash("save", "ไม่พบข้อมูล");
            }
            return Redirect::back();
        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "attenDance";
            $error->message = $e->getMessage();
            $error->save();

            return back()->withError($e->getMessage());
        }
    }

    public function dataUser(Request $request)
    {
        try {
            $name = $request->name;
            $data = Fingerprint::orderByDesc('created_at', )

                ->when($name, function ($query, $name) {
                    return $query->where('name', 'like', '%' . $name . '%');
                })

                ->paginate(5)->withQueryString();
            $data->searchName = $name;

            return view('fingpint.datauser', compact('data'));
        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "attenDance";
            $error->message = $e->getMessage();
            $error->save();

            return back()->withError($e->getMessage());
        }
    }

    public function Checkin(Request $request)
    {
        try {

            $name = $request->name;
            $searchDateStart = $request->date_start;
            $searchDateEnd = $request->date_end;
            $timeStart = $request->time_start;
            $timeEnd = $request->time_end;
            $dateStart = '';
            $dateEnd = '';

            if ($searchDateStart) {
                $dateStart = \Carbon\Carbon::make($searchDateStart)->format('d-m-Y');
            }

            if ($searchDateEnd) {
                $dateEnd = \Carbon\Carbon::make($searchDateEnd)->format('d-m-Y');
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
                    return $query->where('date', $dateStart);
                })

                ->when($dateStart && $dateEnd, function ($query) use ($dateStart, $dateEnd) {

                    return $query->whereBetween('date', [$dateStart, $dateEnd]);
                })

                ->when($timeStart && $timeEnd == null, function ($query) use ($timeStart) {
                    // dump('when date', $datetart);
                    return $query->where('Time', '>=', $timeStart);
                })

                ->when($timeStart && $timeEnd, function ($query) use ($timeStart, $timeEnd) {

                    return $query->whereBetween('Time', [$timeStart, $timeEnd]);
                })

                ->when($status, function ($query, $status) {
                    // dump('when status');0
                    return $query->where('status', $status);
                })
                ->paginate(10)->withQueryString();

            $data->searchName = $name;
            $data->searchdateStart = $dateStart;
            $data->searchdateEnd = $dateEnd;
            $data->searchTimeto = $timeStart;
            $data->searchTimein = $timeEnd;
            $data->searchStatus = $status;

            return view('fingpint.checkin', compact('data'));
        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "attenDance";
            $error->message = $e->getMessage();
            $error->save();

            return back()->withError($e->getMessage());
        }
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
                        $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d H:i:s');
                        $xy['y'] = $index;
                    } else if ($i == 2) {
                        $xy['x'] = \Carbon\Carbon::parse($end->date . $end->Time)->format('Y-m-d H:i:s');
                        $xy['y'] = $index;
                    } else {
                        $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d H:i:s');
                        $xy['y'] = null;
                    }
                    array_push($dataforchart, $xy);
                }
                $index++;
            }
        }

        $time = 0;
        $timelist = [];
        $date = \Carbon\Carbon::now()->format('d-m-Y');
        for ($i = 0; $i < 24; $i++) {
            $timelist[] = [date("H:m", $time + (60 * 60 * $i)), date("H:m", $time + ((60 * 60 * ($i + 1))))];
        }
        $datastatusin = [['Task', 'Hours per Day']];
        $datastatusout = [['Task', 'Hours per Day1']];
        $paginatein = Attendance::where([['status', "เข้า"], ['date', $date]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();

        $paginateout = Attendance::where([['status', "ออก"], ['date', $date]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();
        foreach ($timelist as $timeming) {
            $attendancein = Attendance::where([['status', "เข้า"], ['date', $date]])->whereBetween('Time', [$timeming[0], $timeming[1]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();
            $attendanceout = Attendance::where([['status', "ออก"], ['date', $date]])->whereBetween('Time', [$timeming[0], $timeming[1]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();
            if (sizeof($attendancein) != 0) {
                array_push($datastatusin, [$timeming[0] . " - " . $timeming[1], sizeof($attendancein)]);
            }
            if (sizeof($attendanceout) != 0) {
                array_push($datastatusout, [$timeming[0] . " - " . $timeming[1], sizeof($attendanceout)]);
            }
        }

        $status['data'] = $dataforchart;
        $status['name'] = $listforname;
        $status['datenow'] = $date;
        $arrIn = [];
        $arrOut = [];

        $status['datastatusin'] = $datastatusin;
        $status['datastatusout'] = $datastatusout;
        $test1 = $paginatein->groupBy('fingerprint_id');
        foreach ($test1 as $items) {
            foreach ($items->take(1) as $item) {
                $arrIn[] = $item;
            }
        }
        $test2 = $paginateout->groupBy('fingerprint_id');
        foreach ($test2 as $items) {
            foreach ($items->take(1) as $item) {
                $arrOut[] = $item;
            }
        }
        $paginateinstatus['in'] = $arrIn;
        $paginateinstatus['out'] = $arrOut;

        return view('fingpint.chartuser', ["data" => $status, 'paginate' => $paginateinstatus]);
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
                        $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d H:i:s');
                        $xy['y'] = $index;
                    } else if ($i == 2) {
                        $xy['x'] = \Carbon\Carbon::parse($end->date . $end->Time)->format('Y-m-d H:i:s');
                        $xy['y'] = $index;
                    } else {
                        $xy['x'] = \Carbon\Carbon::parse($start->date . $start->Time)->format('Y-m-d H:i:s');
                        $xy['y'] = null;
                    }
                    array_push($dataforchart, $xy);
                }
                $index++;
            }
        }

        $time = 0;
        $timelist = [];
        for ($i = 0; $i < 24; $i++) {
            $timelist[] = [date("H:m", $time + (60 * 60 * $i)), date("H:m", $time + ((60 * 60 * ($i + 1))))];
        }
        $datastatusin = [['Task', 'Hours per Day']];
        $datastatusout = [['Task', 'Hours per Day1']];
        $paginatein = Attendance::where([['status', "เข้า"], ['date', $date]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();
        $paginateout = Attendance::where([['status', "ออก"], ['date', $date]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();

        foreach ($timelist as $timeming) {
            $attendancein = Attendance::where([['status', "เข้า"], ['date', $date]])->whereBetween('Time', [$timeming[0], $timeming[1]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();
            $attendanceout = Attendance::where([['status', "ออก"], ['date', $date]])->whereBetween('Time', [$timeming[0], $timeming[1]])->join('fingerprint', 'attendance.fingerprint_id', '=', 'fingerprint.id')->get();
            if (sizeof($attendancein) != 0) {
                array_push($datastatusin, [$timeming[0] . " - " . $timeming[1], sizeof($attendancein)]);
            }
            if (sizeof($attendanceout) != 0) {
                array_push($datastatusout, [$timeming[0] . " - " . $timeming[1], sizeof($attendanceout)]);
            }
        }

        $status['data'] = $dataforchart;
        $status['name'] = $listforname;
        $status['datenow'] = $date;
        $arrIn = [];
        $arrOut = [];
        $status['datastatusin'] = $datastatusin;
        $status['datastatusout'] = $datastatusout;
        $testin = $paginatein->groupBy('fingerprint_id');
        foreach ($testin as $items) {
            foreach ($items->take(1) as $item) {
                $arrIn[] = $item;
            }
        }
        $testout = $paginateout->groupBy('fingerprint_id');
        foreach ($testout as $items) {
            foreach ($items->take(1) as $item) {
                $arrOut[] = $item;
            }
        }
        $paginateinstatus['in'] = $arrIn;
        $paginateinstatus['out'] = $arrOut;
        return response()->json(["data" => $status, 'paginate' => $paginateinstatus]);
    }

    public function chartOne($id)
    {

        $dataChart = [];

        $name = Fingerprint::where('id', $id)->get()[0]['name'];
        $attendance = Attendance::where('fingerprint_id', $id)->orderBy('num')->get();
        $firstDate = new DateTime();
        $firstDate->setISODate($firstDate->format('Y'), $firstDate->format('W'));
        $lastDate = null;
        if (count($attendance) == 0) {
            $lastDate = new DateTime();
        } else {
            $lastDate = new DateTime($attendance[sizeof($attendance) - 1]['date']);
        }

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

    public function getposition(Request $request)
    {
        $position = Job_position::where("id_group", $request->id)->get();

        return response()->json(["position" => $position]);
    }

    public function DateThai($strDate, $typDate)
    {

        $strYear = date("Y", strtotime($strDate));
        $strYearEng = date("Y", strtotime($strDate));
        $strMonth = date("m", strtotime($strDate));
        $strDayWeek = date("w", strtotime($strDate));
        $strDay = date("d", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strHours = date("h", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strZone = date("A", strtotime($strDate));
        $strMonthThai = array('00' => "", '01' => "ม.ค.", '02' => "ก.พ.", '03' => "มี.ค.", '04' => "เม.ย.", '05' => "พ.ค.", '06' => "มิ.ย.", '07' => "ก.ค.", '08' => "ส.ค.", '09' => "ก.ย.", '10' => "ต.ค.", '11' => "พ.ย.", '12' => "ธ.ค.");
        $strMonthEngCut = array('00' => "", '01' => "Jan", '02' => "Feb", '03' => "Mar", '04' => "Apr", '05' => "May", '06' => "Jun", '07' => "Jul", '08' => "Aug", '09' => "Sep", '10' => "Oct", '11' => "Nov", '12' => "Dec");
        $strMonthFullThai = array('00' => "", '01' => "ม.ค.", '02' => "ก.พ.", '03' => "มี.ค.", '04' => "เม.ย.", '05' => "พ.ค.", '06' => "มิ.ย.", '07' => "ก.ค.", '08' => "ส.ค.", '09' => "ก.ย.", '10' => "ต.ค.", '11' => "พ.ย.", '12' => "ธ.ค.");
        $StrDayText = array('0' => 'Sunday', '1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday');
        $strMonthEngFull = array('00' => "", '01' => "January", '02' => "February", '03' => "March", '04' => "April", '05' => "May", '06' => "June", '07' => "July", '08' => "August", '09' => "September", '10' => "October", '11' => "November", '12' => "December");
        $strMonthEng = $strMonthEngFull[$strMonth];
        $strMonthEngCut = $strMonthEngCut[$strMonth];
        $StrDayText = $StrDayText[$strDayWeek];

        switch ($typDate) {
            case ("datetime"):
                return "$strDay $strMonth $strYear - $strHour:$strMinute";
                break;
            case ("dateEng"):
                return "$strDay $strMonthEngCut $strYear";
                break;
            case ("datetimefull"):
                return "$strDay $strMonthFullThai $strYear - $strHour:$strMinute";
                break;
            case ("datefull"):
                return "$strDay $strMonthFullThai $strYear";
                break;
            case ("datetimeeng"):
                return "$strDay $strMonthEng $strYearEng - $strHour:$strMinute";
                break;
            case ("date"):
                return "$strDay $strMonthThai $strYear";
                break;
            case ("time"):
                return "$strHour:$strMinute";
                break;
            case ("homepage"):
                return "{$strDay}.{$strMonth}.{$strYear}";
                break;
            case ("homepageShortYear"):
                return "{$strDay}.{$strMonth}.{$strYearEng}";
                break;
            case ("homepageEN"):
                return "{$strYearEng}/{$strMonth}/{$strDay}";
                break;
            case ("datetime_number"):
                return "{$strDay}.{$strMonth}.{$strYear} - $strHour:$strMinute";
                break;
            case ("date_number"):
                return "{$strDay}/{$strMonth}/{$strYearEng}";
                break;
            case ("datetime_number_en"):
                return "{$strDay}/{$strMonth}/{$strYearEng}, $strHour:$strMinute";
                break;
            case ("shortdateeng"):
                return "{$strDay} $strMonthEng {$strYearEng}";
                break;
            case ("shortday"):
                return "{$strDay}";
                break;
            case ("DATECHEQUE"):
                return "{$strDay}/{$strMonth}/{$strYearEng}";
                break;
            case ("shortmonth"):
                return "{$strMonthEng}";
                break;
            case ("shortyear"):
                return "{$strYearEng}";
                break;
            case ("MonthDayYear"):
                return "{$strDay} {$strMonthFullThai} {$strYear}";
                break;
        }
    }

    public function saveUserIdLine(Request $request)
    {
        $line_regis = new line_regis();
        $line_regis->user_id = $request->user_id;
        $line_regis->save();

        return response()->json($line_regis, 200);
    }

    public function getAllLineData()
    {
        $line_regis = line_regis::get();
        $date = \Carbon\Carbon::now()->format('d-m-Y');
        $attendances = Fingerprint::join('attendance', 'attendance.fingerprint_id', '=', 'fingerprint.id')->where("attendance.date", $date)->get();
        $fingerpint_data = Fingerprint::get();

        return response(["attendance" => $attendances, "line_regis" => $line_regis, "fingerprint" => $fingerpint_data]);

    }

    public function saveFB(Request $request)
    {
        $data_fb = new secret_infos();

        $data_fb->secret = $request->secret;

        $data_fb->save();
    }

}

//ค้นหาเเบบรายละเอียด

// public function searchinterest(Request $request)
// {
//   $data = Fingerprint::where('interest', 'like', "%{$request->interest}%")->get('interest');

//   return response()->json($data, 200);
// }

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
