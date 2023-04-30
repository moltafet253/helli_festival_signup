<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Post;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class GetPostInfo extends Controller
{
    public function getPostInfo($id)
    {
        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Get Post Info With This ID => ' . $id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
        $post = Post::select('id', 'title', 'research_format', 'scientific_group', 'research_type', 'special_section', 'festival_title', 'pages_number', 'publish_status', 'activity_type', 'participation_percentage', 'sent_at')->find($id);

        return json_encode(array($post));
    }
}
