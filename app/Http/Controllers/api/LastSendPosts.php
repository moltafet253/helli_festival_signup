<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\etelaat_a;
use App\Models\Helli\Festival;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\User;
use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class LastSendPosts extends Controller
{
    public function lastSendPosts(Request $request, $token)
    {
        $nationalcode = User::where('remember_token', $token)->value('national_code');

        $user = User::where('national_code', '=', $nationalcode)->value('id');
        $user_id = User::find($user);
        $posts = $user_id->allPosts;
        foreach ($posts as $post) {
            if ($post['sent'] === 0) {
//                    $post->sent = 1;
//                    $post->sent_at = now();
//                    $post->save();

                $festivalID = Festival::where('title', $post['festival_title'])->value('id');
                $lastPostID = etelaat_a::orderBy('codeasar', 'desc')->first();
                if ($lastPostID!==null and $lastPostID!=='') {
                    $lastPostID['codeasar']+=1;
                } else {
                    $lastPostID['codeasar'] = $festivalID . '00001';
                }

                $etelaat_a=DB::connection('helli')->table('etelaat_a')->insert([
                        'jashnvareh' => $festivalID.'-'.$post['festival_title'],
                        'codeasar' => $lastPostID['codeasar'],
                        'nameasar' => $lastPostID['codeasar'],
                        'noefaaliat' => $lastPostID['codeasar'],
                        'ghalebpazhouhesh' => $lastPostID['codeasar'],
                        'satharzyabi' => $lastPostID['codeasar'],
                        'groupelmi' => $lastPostID['codeasar'],
                        'bakhshvizheh' => $lastPostID['codeasar'],
                        'subject_bakhshvizheh' => $lastPostID['codeasar'],
                        'noepazhouhesh' => $lastPostID['codeasar'],
                        'vaziatnashr' => $lastPostID['codeasar'],
                        'tedadsafhe' => $lastPostID['codeasar'],
                        'tedadsafahat250kalame' => $lastPostID['codeasar'],
                ]);

            }

//            $maxUpload = HelliUserMaxUploadPost::where('national_code', '=', $nationalcode)->update([
//                'sent_status' => 1,
//                'numbers' => 0,
//            ]);

//            $agent = new Agent();
//            UserActivityLog::create([
//                'user_id' => session('user_id'),
//                'activity' => 'Post Last Send With This NationalCode => ' . $nationalcode,
//                'ip_address' => request()->ip(),
//                'user_agent' => request()->userAgent(),
//                'device' => $agent->device(),
//            ]);
        }
//        if (!$maxUpload) {
//            return response()->json(['errors' => 'Empty File'], 422);
//        }
    }
}
