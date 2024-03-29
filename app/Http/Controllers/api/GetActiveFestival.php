<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Festival;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetActiveFestival extends Controller
{
    public function festival($token)
    {
        $nationalcode = User::where('remember_token', $token)->value('national_code');

        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Get Active Festival With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        $festivalInfo = Festival::select('finish_date')->where('active', '=', 1)->first();
        if ($festivalInfo !== null) {
            $result = $festivalInfo->finish_date;
        } else {
            $result = 'FestivalISOver';
        }

        return $result;
    }
}
