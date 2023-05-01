<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\Helli\Participant;
use App\Models\Helli\Post;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class NewPost extends Controller
{
    public function newPost(Request $request, $token)
    {
        $nationalcode = User::where('remember_token', $token)->value('national_code');

        $user_id = DB::table('users')->where('national_code', $nationalcode)->value('id');
        $festival_title = DB::table('festivals')->where('active', 1)->value('title');
        $decrementBy = 1;

        $name = $request->input('name');
        $research_format = $request->input('research_format');
        $scientific_group = $request->input('scientific_group');
        $research_type = $request->input('research_type');
        $page_number = $request->input('page_number');
        $publish_status = $request->input('publish_status');
        $special_section = $request->input('special_section');
        $activityType = $request->input('activityType');

        $file = $request->file('file');
        $hashName = uniqid('', true) . '.' . $request->file('file')->getClientOriginalName();
        $path = $file->storeAs('public/asarFiles/' . $hashName . '/', $hashName);

        $post = Post::create([
            'user_id' => $user_id,
            'festival_title' => $festival_title,
            'title' => $name,
            'research_format' => $research_format,
            'scientific_group' => $scientific_group,
            'research_type' => $research_type,
            'pages_number' => $page_number,
            'publish_status' => $publish_status,
            'special_section' => $special_section,
            'activity_type' => $activityType,
            'file_src' => $path,
        ]);

        HelliUserMaxUploadPost::where('national_code', '=', $nationalcode)->decrement('numbers', $decrementBy);

        if ($activityType === 'moshtarak') {
            $myCooperation = $request->input('myCooperation');
            Post::where('id', $post->id)->update([
                'participation_percentage' => $myCooperation
            ]);

            $data = $request->input('rows');
            $cooperators = $request->all()['rows'];
            $a = 0;
            $b = 1;
            $c = 2;
            $d = 3;
            $e = 4;
            $f = 5;
            Participant::create([
                'post_id' => $post->id,
                'name' => $cooperators[$a]['name'],
                'family' => $cooperators[$b]['lastname'],
                'national_code' => $cooperators[$c]['codemeli'],
                'case_number' => $cooperators[$d]['filenumber'],
                'participation_percentage' => $cooperators[$e]['Cooperation'],
                'mobile' => $cooperators[$f]['phonenumber'],
            ]);
            HelliUserMaxUploadPost::firstorcreate([
                'national_code' => $cooperators[$c]['codemeli']
            ]);
//        HelliUserMaxUploadPost::where('national_code', '=', $cooperators[$c]['codemeli'])->decrement('numbers', $decrementBy);
            $count = count($cooperators) / 6;
            for ($i = 2; $i <= $count; $i++) {
                Participant::create([
                    'post_id' => $post->id,
                    'name' => $cooperators[$a += 6]['name'],
                    'family' => $cooperators[$b += 6]['lastname'],
                    'national_code' => $cooperators[$c += 6]['codemeli'],
                    'case_number' => $cooperators[$d += 6]['filenumber'],
                    'participation_percentage' => $cooperators[$e += 6]['Cooperation'],
                    'mobile' => $cooperators[$f += 6]['phonenumber'],
                ]);
            }
            $c = 2;
            for ($i = 2; $i <= $count; $i++) {
                HelliUserMaxUploadPost::firstorcreate([
                    'national_code' => $cooperators[$c += 6]['codemeli']
                ]);
            }
//        $c = 2;
//        for ($i = 2; $i <= $count; $i++) {
//            HelliUserMaxUploadPost::where('national_code', '=', $cooperators[$c += 6]['codemeli'])->decrement('numbers', $decrementBy);
//        }
            $agent = new Agent();
            UserActivityLog::create([
                'user_id' => session('user_id'),
                'activity' => 'Post New Post With This ID => ' . $post->id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
        }
    }
}
