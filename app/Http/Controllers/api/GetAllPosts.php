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
    public function getAllPosts($nationalcode)
    {
        $user_id = DB::table('users')->where('national_code', $nationalcode)->value('id');
        $user = User::findOrFail($user_id);
        $posts = $user->posts()->orderBy('id', 'desc')->get();

        $agent = new Agent();
        UserActivityLog::firstorcreate([
            'user_id' => session()->get('nationalcode'),
            'activity' => 'Get All Posts With This NationalCode => ' . $nationalcode,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);

        return response()->json(['posts' => $posts]);

    }
}
