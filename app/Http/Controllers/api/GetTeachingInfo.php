<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetTeachingInfo extends Controller
{
    public function teaching($nationalcode) {
        return DB::table('teaching_infos')->where('national_code', '=', $nationalcode)->get();
    }
}
