<?php

use App\Http\Controllers\ContactControlloer;
use App\Http\Controllers\FingerprintController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuperadminController;
use App\Models\Models\Fingerprint;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
// Route::get('/edit-data', [FingerprintController::class, 'editData']);


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




Route::post('/check-login', [SuperadminController::class, 'login']);
Route::get('/login', function () {
  return view('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/history', [FingerprintController::class, 'getHistory']);


Route::group(['middleware' => 'admin'], function () {

  Route::get('/form-create', [FingerprintController::class, 'createAdmin']);

  Route::post('/save-edit', [FingerprintController::class, 'saveEdit']);

  Route::post('/save-finger', [FingerprintController::class, 'saveFinger']);

  Route::get('/edit/{id}',  [FingerprintController::class, 'edit']);

  Route::get('/delete/{id}',  [FingerprintController::class, 'delete']);

  Route::get('/datauser', [FingerprintController::class, 'dataUser']);

  Route::get('/checkin', [FingerprintController::class, 'Checkin']);

  Route::get('/', [FingerprintController::class, 'index']);

  Route::get('/logout', [SuperadminController::class, 'logout']);

  Route::post('/update', [FingerprintController::class, 'update']);

});
