<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class LastSendPosts extends Controller
{
    public function lastSendPosts(Request $request, $token)
    {
        $nationalcode = User::where('remember_token', $token)->value('national_code');

        if ($request->input('approved') == 1) {
            $user = User::where('national_code', '=', $nationalcode)->value('id');
            $user_id = User::find($user);
            $posts = $user_id->allPosts;
            foreach ($posts as $post) {
                if ($post['sent'] === 0) {
                    $post->sent = 1;
                    $post->sent_at = now();
                    $post->save();
                }
            }
            $maxUpload = HelliUserMaxUploadPost::where('national_code', '=', $nationalcode)->update([
                'sent_status' => 1,
                'numbers' => 0,
            ]);

            $agent = new Agent();
            UserActivityLog::create([
                'user_id' => session('user_id'),
                'activity' => 'Post Last Send With This NationalCode => ' . $nationalcode,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
        }
        if (!$maxUpload) {
            return response()->json(['errors' => 'Empty File'], 422);
        }
    }
}
