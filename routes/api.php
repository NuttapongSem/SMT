<?php

use App\Http\Controllers\FingerprintController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get-data', [FingerprintController::class, 'getData']);

Route::post('/deleteToken', [SuperadminController::class, 'deleteToken']);

Route::post('/date', [FingerprintController::class, 'attenDance']);

Route::post('/login-mobile', [SuperadminController::class, 'loginMobile']);

Route::post('/save', [FingerprintController::class, 'save']);

Route::post('/save-Video', [VideoController::class, 'saveVideo']);

Route::get('/get-Videco', [VideoController::class, 'getVideo']);

Route::post('/status', [FingerprintController::class, 'status']);

Route::get('/allData', [FingerprintController::class, 'allData']);

Route::post('/numview', [VideoController::class, 'numview']);

Route::post('/save_logmobile', [FingerprintController::class, 'saveLogmobile']);

Route::get('/getAllLineData', [FingerprintController::class, 'getAllLineData']);

Route::post('/line_regis', [FingerprintController::class, 'saveUserIdLine']);

Route::post('/edit_fingerprint', [FingerprintController::class, 'editFingerprint']);

Route::get('/getgroup-job', [FingerprintController::class, 'Getgroup_job']);

Route::get('/call', function () {
    Artisan::call('storage:link');
});
