<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetUserInfo extends Controller
{
    public function getUserInfo($nationalcode)
    {
        return DB::table('users')->where('national_code', '=', $nationalcode)->get();
    }
}
