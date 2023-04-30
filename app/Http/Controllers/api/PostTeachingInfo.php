<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\TeachingInfo;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class PostTeachingInfo extends Controller
{
    public function postTeaching(Request $request)
    {
        $national_code = $request->input('teaching.0.national_code');
        $isMaster = $request->input('teaching.0.isMaster');
        $masterCode = $request->input('teaching.0.masterCode');
        $teachingProvince = $request->input('teaching.0.teachingProvince');
        $teachingCity = $request->input('teaching.0.teachingCity');
        $teachingPlaceName = $request->input('teaching.0.teachingPlaceName');
        $teaching = TeachingInfo::where('national_code', '=', $national_code)->update([
            'isMaster' => $isMaster,
            'masterCode' => $masterCode,
            'teachingProvince' => $teachingProvince,
            'teachingCity' => $teachingCity,
            'teachingPlaceName' => $teachingPlaceName,
            'approved' => 1,
        ]);
        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Post Teaching Info With This NationalCode => ' . $national_code,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        return $teaching;
    }
}
