<?php

namespace App\Console\Commands;

use App\Http\Services\LineService;
use App\Models\Attendance;
use App\Models\Fingerprint;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redirect;

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
        $concludelate = Attendance::where("late", "สายเเลัวจ้า")->where("date", $nowdate)->get();
        $late = count($concludelate);
        //จำนวนคนมาทำงานปกติ
        $nowdate = Carbon::now()->format('d-m-Y');
        $Punctual = Attendance::where("late", "ตรงต่อเวลาจ้า")->where("date", $nowdate)->get();
        $notlate = count($Punctual);
        //จำนวนคนที่ไม่เข้างาน
        $number = $numuser - ($late + $notlate);
        $messagePunctual = "";
        $messageCon = "";
        foreach ($Punctual as $notlateperson) {
            $messagePunctual .= "ชื่อ" . " " .  $notlateperson->getall()->name . "\n" .
                "กลุ่ม" . " " .  $notlateperson->getall()->nameposition() . "\n" .
                "ตำเเหน่ง" . " " .  $notlateperson->getall()->jobposition  . "\n";
        }
        foreach ($concludelate as $lateperson) {
            $messageCon .= "ชื่อ" . " " . $lateperson->getall()->name  . "\n" .
                "กลุ่ม" . " " . $lateperson->getall()->nameposition()  . "\n" .
                "ตำเเหน่ง" . " " . $lateperson->getall()->jobposition   . "\n";
        }

        $message =  "\nสรุปการเข้างาน\nวันที่" . " " . $nowdate . "\n" .
            "จำนวนพนักงานทั่งหมด" . " " . $numuser . "\n" .
            "จำนวนพนักงานมาตรงต่อเวลา" . " " . $notlate . "\n" .
            $messagePunctual .
            "จำนวนพนักงานมาสาย" . " " . $late . "\n" .
            $messageCon .
            "จำนวนที่ไม่เข้างาน" . " " . $number  . "\n";
        // echo ($message);
        $lineService = new LineService();
        $lineService->sendNotify($message);
    }
}
