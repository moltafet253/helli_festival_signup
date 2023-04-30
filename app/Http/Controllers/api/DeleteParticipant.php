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
    public function deleteParticipant($id) {
        if ($id) {
            $participant_info=Participant::where('id', '=', $id)->delete();
//            $max_upload=HelliUserMaxUploadPost::where('national_code',$national_code)->increment('numbers',1)->update();

            $agent = new Agent();
            UserActivityLog::create([
                'user_id' => session('user_id'),
                'activity' => 'Delete Participant With This ID => ' . $id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
        }
    }
}
