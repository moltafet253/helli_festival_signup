<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetEducationInfo extends Controller
{
    public function education(Request $request, $nationalcode) {
    $edu = DB::table('educational_infos')->where('national_code', '=', $nationalcode)->get();
    $gender = session()->get('gender');
    return [
        'edu' => $edu,
        'gender' => $gender,
    ];
}
}
