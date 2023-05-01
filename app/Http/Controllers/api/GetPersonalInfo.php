<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetPersonalInfo extends Controller
{
    public function getpersonalinfo($token)
    {
        $nationalcode=User::where('remember_token',$token)->value('national_code');
        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Get Personal Info With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        return User::select('name','family','father_name','national_code','birthdate','gender','personalImageSrc')->where('remember_token',$token)->get();

    }
}
