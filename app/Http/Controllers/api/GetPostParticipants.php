<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Post;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class GetPostParticipants extends Controller
{
    public function postParticipants($id)
    {
        $post = Post::find($id);
        $participants = $post->moshtarakan;
        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Get Post Participants With This ID => ' . $id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        return $participants;
    }
}
