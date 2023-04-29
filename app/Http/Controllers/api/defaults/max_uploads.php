<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class max_uploads extends Controller
{
    public function maxUploads($nationCode) {
        $max_upload = DB::table('helli_user_max_upload_posts')->get()->where('national_code', '=', $nationCode);
        return $max_upload;
    }
}
