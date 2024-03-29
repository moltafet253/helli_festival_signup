<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\Helli\Post;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class DeletePost extends Controller
{
    public function deletePost($id)
    {
        if ($id) {
            $post = Post::find($id);
            $mainUser = User::select('national_code')->where('id',$post['user_id'])->get();
            $mainUser = $mainUser[0]->national_code;
            HelliUserMaxUploadPost::where('national_code', '=', $mainUser)->increment('numbers', 1);
            $post->assigned_post_id=null;
            $post->sent=2;
            $post->delete();
            $post->save();

//        if ($post['activity_type'] == 'moshtarak') {
//            $participants = $post->moshtarakan;
//            foreach ($participants as $items) {
//                HelliUserMaxUploadPost::where('national_code', '=', $items->national_code)->increment('numbers', $incrementBy);
//            }
//        }
            $agent = new Agent();
            UserActivityLog::create([
                'user_id' => session('user_id'),
                'activity' => 'Delete Post With This ID => ' . $id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
        }
    }
}
