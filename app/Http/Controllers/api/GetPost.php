<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetPost extends Controller
{
    public function getPost($nationalcode) {
        $agent = new Agent();
        UserActivityLog::firstorcreate([
            'user_id' => session()->get('nationalcode'),
            'activity' => 'Get Post With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        return DB::table('posts')->where('national_code', '=', $nationalcode)->get();
    }
}
