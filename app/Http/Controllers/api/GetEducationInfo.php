<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetEducationInfo extends Controller
{
    public function education(Request $request, $token)
    {
        $nationalcode = User::where('remember_token', $token)->value('national_code');

        $edu = DB::table('educational_infos')
            ->select('national_code','namemarkaztahsili','noetahsilhozavi','paye','sath','term','ostantahsili','shahrtahsili','madresetahsili','shparvandetahsili','tahsilatghhozavi','reshtedaneshgahi','markaztakhasosihozavi','approved')
            ->where('national_code', '=', $nationalcode)
            ->get();
        $gender = session()->get('gender');

        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
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
