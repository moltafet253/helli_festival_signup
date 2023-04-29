<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetContacts extends Controller
{
    public function contacts($nationalcode) {
        return DB::table('contacts')->where('national_code', '=', $nationalcode)->get();
    }
}
