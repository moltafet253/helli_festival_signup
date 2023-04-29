<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetEduInfoForPosts extends Controller
{
    public function edu($nationalcode) {
        return DB::table('educational_infos')->where('national_code', '=', $nationalcode)->get();
    }
}
