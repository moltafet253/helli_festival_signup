<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class GetAllPosts extends Controller
{
    public function getAllPosts($token)
    {
        $nationalcode = User::where('remember_token', $token)->value('national_code');

        $user_id = DB::table('users')->where('national_code', $nationalcode)->value('id');
        $user = User::findOrFail($user_id);
        $posts = $user->posts()->orderBy('id', 'desc')->get();

        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Get All Posts With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);

        return response()->json(['posts' => $posts]);

    }
}
