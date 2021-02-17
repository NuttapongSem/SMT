<?php

use App\Http\Controllers\FingerprintController;
use App\Http\Controllers\LinenotifyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\VideoController;
use App\Models\Models\Fingerprint;
use App\Models\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\FunctionContextPass;

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
