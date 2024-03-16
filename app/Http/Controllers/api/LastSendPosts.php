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
    public function lastSendPosts($token)
    {
        $festivalID = Festival::where('active', '1')->value('id');
        if ($festivalID) {
            $user = User::where('remember_token', $token)->first();

            $posts = $user->allPosts->filter(function ($post) {
                return $post->sent == 0;
            });
            $contactInfo = Contact::select('mobile', 'national_code', 'phone', 'postal_code', 'address')->where('national_code', $user->national_code)->get();
            $educationalInfo =
                EducationalInfo::select('namemarkaztahsili', 'noetahsilhozavi', 'paye', 'sath', 'term', 'ostantahsili', 'shahrtahsili', 'madresetahsili', 'shparvandetahsili', 'tahsilatghhozavi', 'reshtedaneshgahi', 'markaztakhasosihozavi', 'reshtetakhasosihozavi')
                    ->where('national_code', $user->national_code)->get();
            $teachingInfo = TeachingInfo::select('masterCode', 'teachingProvince', 'teachingCity', 'teachingPlaceName', 'isMaster')->where('national_code', $user->national_code)->get();

            $gender = $user->gender;

            switch ($gender) {
                case 'مرد':
                    $paye = EducationalInfo::select('paye')->where('national_code', $user->national_code)->first();
                    $paye = $paye['paye'];
                    break;
                case 'زن':
                    $sath = EducationalInfo::select('sath')->where('national_code', $user->national_code)->first();
                    $term = EducationalInfo::select('term')->where('national_code', $user->national_code)->first();
                    $sath = $sath['sath'];
                    $term = $term['term'];
                    break;
            }

            foreach ($posts as $post) {
                $lastPostID = etelaat_a::orderBy('codeasar', 'desc')->first();

                if ($lastPostID) {
                    if (substr($lastPostID['codeasar'], 0, 2) == $festivalID) {
                        if ($lastPostID !== null and $lastPostID !== '') {
                            $lastPostID['codeasar'] += 1;
                        } else {
                            $lastPostID['codeasar'] = $festivalID . '00001';
                        }
                    } else {
                        $lastPostID['codeasar'] = $festivalID . '00001';
                    }
                } else {
                    $lastPostID['codeasar'] = $festivalID . '00001';
                }

                if ($post['activity_type'] == 'fardi') {
                    $activity_type = 'فردی';
                } elseif ($post['activity_type'] == 'moshtarak') {
                    $activity_type = 'مشترک';
                }

                if ($gender == 'مرد') {
                    if ($post['research_format'] != 'پایان‌نامه سطح سه' and $post['research_format'] != 'تحقیق پایانی سطح دو') {
                        if ($paye == 1 or $paye == 2 or $paye == 3) {
                            $rateLevel = 1;
                        } elseif ($paye == 4 or $paye == 5 or $paye == 6) {
                            $rateLevel = 2;
                        } elseif ($paye == 7 or $paye == 8 or $paye == 9) {
                            $rateLevel = 3;
                        } else {
                            $rateLevel = 4;
                        }
                    } elseif ($post['research_format'] == 'پایان‌نامه سطح سه') {
                        $rateLevel = 3;
                    } elseif ($post['research_format'] == 'تحقیق پایانی سطح دو') {
                        $rateLevel = 2;
                    }
                } elseif ($gender == 'زن') {
                    if ($post['research_format'] != 'پایان‌نامه سطح سه' and $post['research_format'] != 'تحقیق پایانی سطح دو') {
                        switch ($sath) {
                            case 2:
                                if ($term == 1 or $term == 2 or $term == 3 or $term == 4 or $term == 5 or $term == 6) {
                                    $rateLevel = 1;
                                } elseif ($term == 7 or $term == 8 or $term == 9 or $term == 10) {
                                    $rateLevel = 2;
                                }
                                break;
                            case 3:
                                if ($term == 1 or $term == 2) {
                                    $rateLevel = 2;
                                } elseif ($term == 3 or $term == 4 or $term == 5 or $term == 6) {
                                    $rateLevel = 3;
                                }
                                break;
                            case 4:
                                $rateLevel = 4;
                                break;
                        }

                    } elseif ($post['research_format'] == 'پایان‌نامه سطح سه') {
                        $rateLevel = 3;
                    } elseif ($post['research_format'] == 'تحقیق پایانی سطح دو') {
                        $rateLevel = 2;
                    }
                }

                $book = 'کتاب';
                $article = 'مقاله';

                if (strpos($post['research_format'], $book) !== false or strpos($post['research_format'], $article) !== false) {
                    $tahsilatghhozavi = $educationalInfo[0]['tahsilatghhozavi'];
                    switch ($tahsilatghhozavi) {
                        case 'لیسانس':
                            switch ($rateLevel) {
                                case 1:
                                case 2:
                                case 3:
                                    $rateLevel++;
                                    break;
                            }
                            break;
                        case 'فوق لیسانس':
                            switch ($rateLevel) {
                                case 1:
                                case 2:
                                    $rateLevel += 2;
                                    break;
                                case 3:
                                    $rateLevel += 1;
                                    break;
                            }
                            break;
                        case 'دکتری':
                            $rateLevel = 4;
                            break;
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
                $AssignURL = 'https://ssmp.ismc.ir/' . str_replace($word_to_remove, 'storage', $url);

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
                    'fileasar' => $AssignURL,
                    'vaziatkarnameostani' => null,
                    'approve_sianat' => 9,
                ]);

                $ostantahsili = $educationalInfo[0]['ostantahsili'];
                $shahrtahsili = $educationalInfo[0]['shahrtahsili'];
                $madrese = $educationalInfo[0]['madresetahsili'];
                if ($teachingInfo[0]['isMaster'] == 'بله') {
                    $teachingInfo[0]['isMaster'] = 'هست';
//                $ostantahsili = $teachingInfo[0]['teachingProvince'];
//                $shahrtahsili = $teachingInfo[0]['teachingCity'];
//                $madrese = $teachingInfo[0]['teachingPlaceName'];
                } elseif ($teachingInfo[0]['isMaster'] == 'خیر') {
                    $teachingInfo[0]['isMaster'] = 'نیست';
                }

                $etelaat_p = DB::connection('helli')->table('etelaat_p')->insert([
                    'jashnvareh' => $festivalID . '-' . $post['festival_title'],
                    'codeasar' => $lastPostID['codeasar'],
                    'codemelli' => $user->national_code,
                    'fname' => $user->name,
                    'family' => $user->family,
                    'father_name' => $user->father_name,
                    'tarikhtavallod' => $user->birthdate,
                    'gender' => $user->gender,
                    'shartsenni' => 'دارد',
                    'sh_shenasnameh' => $user->shenasname,

                    'codeposti' => $contactInfo[0]['postal_code'],
                    'telephone' => $contactInfo[0]['phone'],
                    'mobile' => $contactInfo[0]['mobile'],
                    'address' => $contactInfo[0]['address'],

                    'ostantahsili' => $ostantahsili,
                    'shahrtahsili' => $shahrtahsili,
                    'madrese' => $madrese,
                    'paye' => $educationalInfo[0]['paye'],
                    'sath' => $educationalInfo[0]['sath'],
                    'term' => $educationalInfo[0]['term'],
                    'tahsilatghhozavi' => $educationalInfo[0]['tahsilatghhozavi'],
                    'reshtedaneshgahi' => $educationalInfo[0]['reshtedaneshgahi'],
                    'shparvandetahsili' => $educationalInfo[0]['shparvandetahsili'],
                    'markaztakhasosihozavi' => $educationalInfo[0]['markaztakhasosihozavi'],
                    'namemarkaztahsili' => $educationalInfo[0]['namemarkaztahsili'],
                    'noetahsilathozavi' => $educationalInfo[0]['noetahsilhozavi'],
                    'reshtetakhasosihozavi' => $educationalInfo[0]['reshtetakhasosihozavi'],

                    'master' => $teachingInfo[0]['isMaster'],
                    'mastercode' => $teachingInfo[0]['masterCode'],
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

                $agent = new Agent();
                UserActivityLog::create([
                    'user_id' => session('user_id'),
                    'activity' => 'Post Last Send With This NationalCode => ' . $user->national_code . ' And This Post ID=> ' . $post->id,
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'device' => $agent->device(),
                ]);
            }

            HelliUserMaxUploadPost::where('national_code', '=', $user->national_code)->update([
                'sent_status' => 1,
                'numbers' => 0,
            ]);
//        if (!$maxUpload) {
//            return response()->json(['errors' => 'Empty File'], 422);
//        }
        }

    }
}
