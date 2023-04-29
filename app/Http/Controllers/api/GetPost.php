<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetPost extends Controller
{
    public function getPost($nationalcode) {
        return DB::table('posts')->where('national_code', '=', $nationalcode)->get();
    }
}
