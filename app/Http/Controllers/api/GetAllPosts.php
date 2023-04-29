<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetAllPosts extends Controller
{
    public function getAllPosts($nationalcode)
    {
        $user_id = DB::table('users')->where('national_code', $nationalcode)->value('id');
        $user = User::findOrFail($user_id);
        $posts = $user->posts()->orderBy('id', 'desc')->get();
        return response()->json(['posts' => $posts]);
    }
}
