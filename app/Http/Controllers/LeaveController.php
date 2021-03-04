<?php

namespace App\Http\Controllers;

use App\Models\Fingerprint;
use App\Models\Group_position;
use App\Models\Job_position;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LeaveController extends Controller
{
    public function leave(Request $request)
    {
        $list_group = Group_position::all();
        $list_job = Job_position::all();
        $list_fingerprint = Fingerprint::all();

        return view('fingpint.leave', ['list_job' => $list_job, 'list_group' => $list_group, 'list_fingerprint' => $list_fingerprint]);
    }
    public function saveLeave(Request $request)
    {
        $data_leave = new Leave();
        $data_leave->name_id = $request->name_id;
        $data_leave->annotation = $request->annotation;
        $data_leave->leave_type = $request->leave_type;
        $data_leave->group = $request->group;
        $data_leave->jobposition = $request->jobposition;

        $data_leave->date_start = Carbon::make($request->date_start);
        $data_leave->date_end = Carbon::make($request->date_end);
        $data_leave->endorser = $request->endorser;
        $data_leave->position_endorser = $request->position_endorser;
        // dd($request);
        $data_leave->save();

        return redirect()->route('getleave', ['id' => $data_leave->id]);
    }

    public function getLeaveById($id)
    {
        $result = Leave::with("profiles")->find($id);
        $result->date_now = Carbon::now()->format('d-m-Y');
        $result->date_now = $this->DateThai($result->date_now, "date");

        $result->date_start = date(Carbon::createFromFormat('Y-m-d H:i:s', $result->date_start, '+7')->format('d-m-Y'));
        $result->date_start = $this->DateThai($result->date_start, "date");
        $result->date_end = date(Carbon::createFromFormat('Y-m-d H:i:s', $result->date_end, '+7')->format('d-m-Y'));
        $result->date_end = $this->DateThai($result->date_end, "date");
        $pdf_viewer = $this->generatePDF($result, $id);
        $pdf_download = $this->generatePDF($result, $id);

        $file_name = 'pdf_file_' . uniqid(0000) . '.pdf';
        $folderPath = './public/exportPDF/';
        $content = $pdf_download->download($file_name);

        Storage::put($folderPath . $file_name, $content);
        DB::table('leave')
            ->where('id', $id)
            ->update(['path_pdf' => $file_name]);

        return $pdf_viewer->stream();
    }
    public function generatePDF($result, $id)
    {
        $pdf = App::make('dompdf.wrapper');
        $html = view('leave.detail', ['data' => $result])->render();
        $pdf->loadHTML($html);
        return $pdf;
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
                return "$strDay $strMonthThai[$strMonth] $strYear";
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

    public function infoLeave($id)
    {

        $data_leave = Leave::where('name_id', $id)->orderBy('id', 'desc')->first();
        $data_leave->date_now = Carbon::now()->format('d-m-Y');
        $data_leave->date_now = $this->DateThai($data_leave->date_now, "date");

        $data_leave->date_start = date(Carbon::createFromFormat('Y-m-d H:i:s', $data_leave->date_start, '+7')->format('d-m-Y'));
        $data_leave->date_start = $this->DateThai($data_leave->date_start, "date");
        $data_leave->date_end = date(Carbon::createFromFormat('Y-m-d H:i:s', $data_leave->date_end, '+7')->format('d-m-Y'));
        $data_leave->date_end = $this->DateThai($data_leave->date_end, "date");

        return view('leave.dataleave', ['data' => $data_leave]);

    }
    public function deleteLeave($id)
    {
        $data = Leave::find($id);
        if (isset($data)) {
            $data->delete();
            Session::flash("delete_leave", "ลบเรียบร้อย");
        } else {
            Session::flash("delete_leave", "ไม่พบข้อมูล");
        }
        return Redirect::back();

    }
}
