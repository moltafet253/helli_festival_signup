<?php

namespace App\Http\Controllers\api\defaults;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class max_uploads extends Controller
{
    public function maxUploads($token) {
        $nationalcode = User::where('remember_token', $token)->value('national_code');
        $max_upload = DB::table('helli_user_max_upload_posts')->get()->where('national_code', '=', $nationalcode);
        return $max_upload;
    }
}
