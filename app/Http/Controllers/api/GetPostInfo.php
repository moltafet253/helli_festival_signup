<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Post;
use Illuminate\Http\Request;

class GetPostInfo extends Controller
{
    public function getPostInfo($id)
    {
        $post = Post::select('id', 'title', 'research_format', 'scientific_group', 'research_type', 'special_section', 'festival_title', 'pages_number', 'publish_status', 'activity_type', 'participation_percentage', 'sent_at')->find($id);

        return json_encode(array($post));
    }
}
