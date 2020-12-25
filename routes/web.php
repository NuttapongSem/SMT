<?php

use App\Http\Controllers\ContactControlloer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Models\Models\Fingerprint;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/create', function () {
  return view('fingpint.create');
});
Route::get('/edit', function () {
  return view('fingpint.edit');
});
Route::get('/delete', function () {
  return view('fingpint.delete');
});
Route::get('/finger', function () {
  $data = Fingerprint::get();

  foreach ($data as $value) {
    $value['imgPathFingerprint'] = 'http://127.0.0.1:8000/storage/uploads/image-fingerprint/' . $value->fingerprint;
    $value['imgPathProFile'] = 'http://127.0.0.1:8000/storage/uploads/image-Porfile/' . $value->imguser;
  }
  return view('fingpint.index', ["data" => $data]);
});
Route::post('/update', [FingerprintController::class, 'update']);
Route::get('/video/{id}', function ($id) {
  $response = Http::get("https://ta.kisrateam.com/api/get-lastest-data");
  $data = $response->json()[0];
  if ($id == 0) {
    $videoList = array("172825105", "190944549", "192650599", "166409731");
  } else {
    switch ($data["interest"]) {
      case "รถ":
        $videoList = array("396260528");
        break;
      case "ฟุตบอล":
        $videoList = array("1309183");
        break;
      default:
        $videoList = array("172825105", "190944549", "192650599", "166409731");
    }
  }
  mt_srand(time());
  $index_random = mt_rand(0, count($videoList) - 1);
  return view('video', ["video" =>  $videoList[$index_random], 'data' => $data]);
});
