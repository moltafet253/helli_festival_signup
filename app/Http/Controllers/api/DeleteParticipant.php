<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\Helli\Participant;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class DeleteParticipant extends Controller
{
    public function deleteParticipant($id,$national_code=1) {
        $increment_by=1;
        if ($id) {
            $participant_info=Participant::where('id', '=', $id)->delete();
//            $max_upload=HelliUserMaxUploadPost::where('national_code',$national_code)->increment('numbers',$increment_by)->update();

            $agent = new Agent();
            UserActivityLog::firstorcreate([
                'user_id' => session()->get('nationalcode'),
                'activity' => ' Delete Participant with This ID => ' . $id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
        }
    }
}
