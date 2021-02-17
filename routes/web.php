<?php

use App\Http\Controllers\ContactControlloer;
use App\Http\Controllers\FingerprintController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuperadminController;
use App\Http\Middleware\SuperAdmin;
use App\Models\Models\Fingerprint;
use App\Models\TokenLogin;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/check-login', [SuperadminController::class, 'login']);

Route::get('/login', function (Request $request) {
  $token = TokenLogin::where('token', $request->token)->first();
  if ($token) {
    $auth = User::where("email", $token->email)->first();
    if ($auth->admin == "superadmin") {
      Auth::login($auth);
      $auth->update(["type" => 1]);
      return redirect('/');
    }
  }
  return view('login');
});

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

  Route::get('/chartuser', [FingerprintController::class, 'chartUser']);

  Route::get('/chartuser/{id}', [FingerprintController::class, 'chartOne']);

  Route::get('/getdate', [FingerprintController::class, 'getDate']);

  Route::get('/get-position', [FingerprintController::class, 'getposition']);
});
