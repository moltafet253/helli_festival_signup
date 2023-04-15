<?php

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\CheckSession;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('CheckSession')->get('/contact/{nationalcode}', function ($nationalcode) {
    return DB::table('contacts')->where('national_code', '=',$nationalcode)->get();
});

Route::post('/contact/save/{nationCode}', function (Request $request,$nationCode) {
    $phone=$request->input('contact.0.phone');
    $mobile=$request->input('contact.0.mobile');
    $address=$request->input('contact.0.address');
    $postal_code=$request->input('contact.0.postal_code');
    $user = Contact::where('national_code','=',$nationCode)->update([
        'national_code' => $nationCode,
        'phone' => $phone,
        'mobile' => $mobile,
        'address'=> $address,
        'postal_code'=> $postal_code,
    ]);
});

Route::get('/edu/{nationalcode}', function (Request $request,$nationalcode) {
    $edu= DB::table('educational_infos')->where('national_code', '=',$nationalcode)->get();
    $gender = session()->get('gender');
    return [
        'edu'=>$edu,
        'gender'=>$gender
    ];
});
