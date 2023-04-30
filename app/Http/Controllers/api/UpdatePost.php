<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\Helli\Participant;
use App\Models\Helli\Post;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class UpdatePost extends Controller
{
    public function updatePost(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $research_format = $request->input('research_format');
        $scientific_group = $request->input('scientific_group');
        $research_type = $request->input('research_type');
        $page_number = $request->input('page_number');
        $publish_status = $request->input('publish_status');
        $special_section = $request->input('special_section');
        $activityType = $request->input('activityType');

        if ($request->file('file')) {
            $file = $request->file('file');
            $hashName = uniqid('', true) . '.' . $request->file('file')->getClientOriginalName();
            $path = $file->storeAs('public/asarFiles/' . $hashName . '/' . $hashName);
            $post = Post::where('id', $id)->update([
                'file_src' => $path,
            ]);
        }

        $post2 = Post::where('id', $id)->update([
            'title' => $name,
            'research_format' => $research_format,
            'scientific_group' => $scientific_group,
            'research_type' => $research_type,
            'pages_number' => $page_number,
            'publish_status' => $publish_status,
            'special_section' => $special_section,
            'activity_type' => $activityType,
        ]);

        if ($activityType === 'fardi') {
            Post::where('id', $id)->update([
                'participation_percentage' => 100
            ]);
        } elseif ($activityType === 'moshtarak') {
            $myCooperation = $request->input('myCooperation');
            Post::where('id', $id)->update([
                'participation_percentage' => $myCooperation
            ]);

            if ($request->input('rows')[0]['name']) {
                $cooperators = $request->all()['rows'];
                $a = 0;
                $b = 1;
                $c = 2;
                $d = 3;
                $e = 4;
                $f = 5;
                Participant::firstorcreate([
                    'post_id' => $id,
                    'name' => $cooperators[$a]['name'],
                    'family' => $cooperators[$b]['lastname'],
                    'national_code' => $cooperators[$c]['codemeli'],
                    'case_number' => $cooperators[$d]['filenumber'],
                    'participation_percentage' => $cooperators[$e]['Cooperation'],
                    'mobile' => $cooperators[$f]['phonenumber'],
                ]);
                $count = count($cooperators) / 6;
                for ($i = 2; $i <= $count; $i++) {
                    Participant::firstorcreate([
                        'post_id' => $id,
                        'name' => $cooperators[$a += 6]['name'],
                        'family' => $cooperators[$b += 6]['lastname'],
                        'national_code' => $cooperators[$c += 6]['codemeli'],
                        'case_number' => $cooperators[$d += 6]['filenumber'],
                        'participation_percentage' => $cooperators[$e += 6]['Cooperation'],
                        'mobile' => $cooperators[$f += 6]['phonenumber'],
                    ]);
                }
            }

        }
        $agent = new Agent();
        UserActivityLog::create([
            'user_id' => session('user_id'),
            'activity' => 'Update Post With This ID => ' . $id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'device' => $agent->device(),
        ]);
    }
}
