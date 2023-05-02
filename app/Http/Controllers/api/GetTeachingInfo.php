<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetTeachingInfo extends Controller
{
    public function teaching($token) {
        $nationalcode = User::where('remember_token', $token)->value('national_code');

        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Get Teaching Info With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        return DB::table('teaching_infos')
            ->select('national_code','isMaster','masterCode','teachingProvince','teachingCity','teachingPlaceName','approved')
            ->where('national_code', '=', $nationalcode)->get();
    }
}
