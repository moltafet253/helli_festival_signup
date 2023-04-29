<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetEducationInfo extends Controller
{
    public function education(Request $request, $nationalcode) {
    $edu = DB::table('educational_infos')->where('national_code', '=', $nationalcode)->get();
    $gender = session()->get('gender');

        $agent = new Agent();
        UserActivityLog::firstorcreate([
            'user_id' => session()->get('nationalcode'),
            'activity' => 'Get All Posts With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);

    return [
        'edu' => $edu,
        'gender' => $gender,
    ];
}
}
