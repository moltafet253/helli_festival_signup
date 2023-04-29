<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetEduInfoForPosts extends Controller
{
    public function edu($nationalcode) {
        $agent = new Agent();
        UserActivityLog::firstorcreate([
            'user_id' => session()->get('nationalcode'),
            'activity' => 'Get Education Info With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        return DB::table('educational_infos')->where('national_code', '=', $nationalcode)->get();
    }
}
