<?php

use App\Http\Controllers\FingerprintController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\VideoController;
use App\Models\Models\Fingerprint;
use Illuminate\Http\Request;
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
Route::post('/save', [FingerprintController::class, 'save']);
Route::get('/get-data', [FingerprintController::class, 'getData']);
Route::get('/get-lastest-data', [FingerprintController::class, 'getDataLastest']);
Route::post('/edit-data', [FingerprintController::class, 'editData']);
Route::post('/save-Video', [VideoController::class, 'saveVideo']);
Route::get('/get-Videco', [VideoController::class, 'getVideo']);
Route::get('/search', [VideoController::class, 'searchinterest']);
// Route::('/contact',[contactControlloer::class,'create']);