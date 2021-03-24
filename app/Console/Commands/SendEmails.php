<?php

namespace App\Console\Commands;

use App\Http\Services\LineService;
use App\Models\Attendance;
use App\Models\Fingerprint;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //จำนวนคน
        $user = Fingerprint::get();
        $numuser = count($user);
        //จำนวนคนมาสาย
        $nowdate = Carbon::now()->format('d-m-Y');
        $concludelate = Attendance::where("late", "สาย")->where("date", $nowdate)->get();
        $late = count($concludelate);
        //จำนวนคนมาทำงานปกติ
        $nowdate = Carbon::now()->format('d-m-Y');
        $Punctual = Attendance::where("late", "ตรงต่อเวลา")->where("date", $nowdate)->get();
        $notlate = count($Punctual);
        //จำนวนคนที่ออกงาน
        $nowdate = Carbon::now()->format('d-m-Y');
        $Outjob = Attendance::where("late", "ออกก่อนเวลา")->where("date", $nowdate)->get();
        $Outtime = count($Outjob);
        //จำนวนคนที่ไม่เข้างาน
        $nowdate = Carbon::now()->format('d-m-Y');
        $massegenotime = "";
        foreach ($user as $U) {
            $usernum = Attendance::where("date", $nowdate)->where("fingerprint_id", $U->id)->get();
            if (count($usernum) == 0) {
                $massegenotime .= "ชื่อ" . " " . $U->name . "\n";
            }
        }

        //จำนวนคนที่ไม่เข้างาน {
        $number = $numuser - ($late + $notlate);
        $messagePunctual = "";
        $messageCon = "";
        $messageOut = "";
        foreach ($Punctual as $notlateperson) {
            $messagePunctual .= "ชื่อ" . " " . $notlateperson->getall()->name . "\n";
            // "กลุ่ม" . " " . $notlateperson->getall()->nameposition() . "\n" .
            // "ตำเเหน่ง" . " " . $notlateperson->getall()->jobpositions->name . "\n";
        }
        foreach ($concludelate as $lateperson) {
            $messageCon .= "ชื่อ" . " " . $lateperson->getall()->name . "\n";
            // "กลุ่ม" . " " . $lateperson->getall()->nameposition() . "\n" .
            // "ตำเเหน่ง" . " " . $lateperson->getall()->jobpositions->name . "\n";
        }
        foreach ($Outjob as $lateperson) {
            $messageOut .= "ชื่อ" . " " . $lateperson->getall()->name . "\n";
            // "กลุ่ม" . " " . $lateperson->getall()->nameposition() . "\n" .
            // "ตำเเหน่ง" . " " . $lateperson->getall()->jobpositions->name . "\n";
        }

        $message = "\nสรุปการเข้างาน\nวันที่" . " " . $nowdate . "\n" .
            "จำนวนพนักงานทั่งหมด" . " " . $numuser . "\n" .
            "จำนวนพนักงานมาตรงต่อเวลา" . " " . $notlate . "\n" .
            $messagePunctual .
            "จำนวนพนักงานออกก่อนเวลา" . " " . $Outtime . "\n" .
            $messageOut .
            "จำนวนพนักงานมาสาย" . " " . $late . "\n" .
            $messageCon .
            "จำนวนที่ไม่เข้างาน" . " " . $number . "\n" . $massegenotime;

        if (Carbon::now()->format('D') != "Sat" && Carbon::now()->format('D') != "Sun") {
            $lineService = new LineService();
            $lineService->sendNotify($message);
        }
        // echo ($message);
        // $lineService = new LineService();
        // $lineService->sendNotify($message);
    }
}
