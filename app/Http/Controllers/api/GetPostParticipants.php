<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Post;
use Illuminate\Http\Request;

class GetPostParticipants extends Controller
{
    public function postParticipants($id)
    {
        $post = Post::find($id);
        $participants = $post->moshtarakan;
        return $participants;
    }
}
