<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\Contact;
use App\Models\Helli\EducationalInfo;
use App\Models\Helli\etelaat_a;
use App\Models\Helli\Festival;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\Helli\Post;
use App\Models\Helli\TeachingInfo;
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
        $userAllInfo = User::find($user);
        $posts = $userAllInfo->allPosts;
        foreach ($posts as $post) {
            if ($post['sent'] === 0) {

                $festivalID = Festival::where('title', $post['festival_title'])->value('id');
                $lastPostID = etelaat_a::orderBy('codeasar', 'desc')->first();
                $contactInfo = Contact::select('mobile', 'national_code', 'phone', 'postal_code', 'address')->where('national_code', $nationalcode)->get();
                $educationalInfo =
                    EducationalInfo::select('namemarkaztahsili', 'noetahsilhozavi', 'paye', 'sath', 'term', 'ostantahsili', 'shahrtahsili', 'madresetahsili', 'shparvandetahsili', 'tahsilatghhozavi', 'reshtedaneshgahi', 'markaztakhasosihozavi')
                        ->where('national_code', $nationalcode)->get();
                $teachingInfo = TeachingInfo::select('masterCode', 'teachingProvince', 'teachingCity', 'teachingPlaceName', 'isMaster')->where('national_code', $nationalcode)->get();

                if ($lastPostID !== null and $lastPostID !== '') {
                    $lastPostID['codeasar'] += 1;
                } else {
                    $lastPostID['codeasar'] = $festivalID . '00001';
                }

                if ($post['activity_type'] == 'fardi') {
                    $activity_type = 'فردی';
                } elseif ($post['activity_type'] == 'moshtarak') {
                    $activity_type = 'مشترک';
                }

                if ($userAllInfo['gender'] == 'مرد') {
                    $paye = EducationalInfo::select('paye')->where('national_code', $nationalcode)->get();
                    $paye = $paye[0]['paye'];
                    if ($paye == 1 or $paye == 2 or $paye == 3) {
                        $rateLevel = 1;
                    } elseif ($paye == 4 or $paye == 5 or $paye == 6) {
                        $rateLevel = 2;
                    } elseif ($paye == 7 or $paye == 8 or $paye == 9) {
                        $rateLevel = 3;
                    } elseif ($paye >= 10) {
                        $rateLevel = 4;
                    }
                } elseif ($userAllInfo['gender'] == 'زن') {
                    $sath = EducationalInfo::select('sath')->where('national_code', $nationalcode)->get();
                    $term = EducationalInfo::select('term')->where('national_code', $nationalcode)->get();
                    $sath = $sath[0]['sath'];
                    $term = $term[0]['term'];
                    if ($post['research_format'] != 'پایان‌نامه' and $post['research_format'] != 'تحقیق پایانی') {
                        switch ($sath) {
                            case 2:
                                if ($term == 1 or $term == 2 or $term == 3) {
                                    $rateLevel = 1;
                                } elseif ($term == 4 or $term == 5) {
                                    $rateLevel = 2;
                                }
                                break;
                            case 3:
                                if ($term == 1) {
                                    $rateLevel = 2;
                                } elseif ($term == 2 or $term == 3) {
                                    $rateLevel = 2;
                                }
                                break;
                            case 4:
                                $rateLevel = 4;
                                break;
                        }
                    } elseif ($post['research_format'] != 'پایان‌نامه') {
                        $rateLevel = 3;
                    } elseif ($post['research_format'] != 'تحقیق پایانی') {
                        $rateLevel = 2;
                    }
                }

                if ($post['special_section'] != null and $post['special_section'] != 'null' and $post['special_section'] != '') {
                    $hasSpecial = 'هست';
                    $specialSection = $post['special_section'];
                } else {
                    $hasSpecial = 'نیست';
                    $specialSection = null;
                }

                $url = $post['file_src'];
                $word_to_remove = "public";
                $AssignURL = env('APP_URL'). '/' . str_replace($word_to_remove, 'storage', $url);

                $etelaat_a = DB::connection('helli')->table('etelaat_a')->insert([
                    'jashnvareh' => $festivalID . '-' . $post['festival_title'],
                    'codeasar' => $lastPostID['codeasar'],
                    'nameasar' => $post['title'],
                    'noefaaliat' => $activity_type,
                    'ghalebpazhouhesh' => $post['research_format'],
                    'satharzyabi' => $rateLevel,
                    'groupelmi' => $post['scientific_group'],
                    'bakhshvizheh' => $hasSpecial,
                    'subject_bakhshvizheh' => $specialSection,
                    'noepazhouhesh' => $post['research_type'],
                    'vaziatnashr' => $post['publish_status'],
                    'tedadsafhe' => $post['pages_number'],
                    'tedadsafahat250kalame' => $post['pages_number'],
                    'fileasar' =>$AssignURL,
                ]);


                if ($teachingInfo[0]['isMaster'] == 'بله') {
                    $teachingInfo[0]['isMaster'] = 'هست';
                } elseif ($teachingInfo[0]['isMaster'] == 'خیر') {
                    $teachingInfo[0]['isMaster'] = 'نیست';
                }

                $etelaat_p = DB::connection('helli')->table('etelaat_p')->insert([
                    'jashnvareh' => $festivalID . '-' . $post['festival_title'],
                    'codeasar' => $lastPostID['codeasar'],
                    'codemelli' => $nationalcode,
                    'fname' => $userAllInfo['name'],
                    'family' => $userAllInfo['family'],
                    'father_name' => $userAllInfo['father_name'],
                    'tarikhtavallod' => $userAllInfo['birthdate'],
                    'gender' => $userAllInfo['gender'],
                    'shartsenni' => 'دارد',
                    'sh_shenasnameh' => $userAllInfo['shenasnameh'],

                    'codeposti' => $contactInfo[0]['postal_code'],
                    'telephone' => $contactInfo[0]['phone'],
                    'mobile' => $contactInfo[0]['mobile'],
                    'address' => $contactInfo[0]['address'],

                    'ostantahsili' => $educationalInfo[0]['ostantahsili'],
                    'shahrtahsili' => $educationalInfo[0]['shahrtahsili'],
                    'madrese' => $educationalInfo[0]['madresetahsili'],
                    'paye' => $educationalInfo[0]['paye'],
                    'sath' => $educationalInfo[0]['sath'],
                    'term' => $educationalInfo[0]['term'],
                    'tahsilatghhozavi' => $educationalInfo[0]['tahsilatghhozavi'],
                    'reshtedaneshgahi' => $educationalInfo[0]['reshtedaneshgahi'],
                    'shparvandetahsili' => $educationalInfo[0]['shparvandetahsili'],
                    'markaztakhasosihozavi' => $educationalInfo[0]['markaztakhasosihozavi'],
                    'namemarkaztahsili' => $educationalInfo[0]['namemarkaztahsili'],
                    'noetahsilathozavi' => $educationalInfo[0]['noetahsilhozavi'],

                    'master' => $teachingInfo[0]['isMaster'],
                    'mastercode' => $teachingInfo[0]['mastercode'],
                    'teachingProvince' => $teachingInfo[0]['teachingProvince'],
                    'teachingCity' => $teachingInfo[0]['teachingCity'],
                    'teachingPlaceName' => $teachingInfo[0]['teachingPlaceName'],
                ]);
                if ($post->activity_type = 'moshtarak') {
                    $id = $post->id;
                    $post = Post::find($id);
                    $participants = $post->moshtarakan;
                    foreach ($participants as $participant) {
                        DB::connection('helli')->table('participants')->insert([
                            'jashnvareh' => $festivalID . '-' . $post['festival_title'],
                            'codeasar' => $lastPostID['codeasar'],
                            'name' => $participant['name'],
                            'family' => $participant['family'],
                            'national_code' => $participant['national_code'],
                            'participation_percentage' => $participant['participation_percentage'],
                            'mobile' => $participant['mobile'],
                            'created_at' => now(),
                        ]);
                    }
                }
                $post->sent = 1;
                $post->sent_at = now();
                $post->assigned_post_id = $lastPostID['codeasar'];
                $post->save();
            }


            $agent = new Agent();
            UserActivityLog::create([
                'user_id' => session('user_id'),
                'activity' => 'Post Last Send With This NationalCode => ' . $nationalcode . ' And This Post ID=> ' . $post->id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
        }
        $maxUpload = HelliUserMaxUploadPost::where('national_code', '=', $nationalcode)->update([
            'sent_status' => 1,
            'numbers' => 0,
        ]);
        if (!$maxUpload) {
            return response()->json(['errors' => 'Empty File'], 422);
        }
    }
}
