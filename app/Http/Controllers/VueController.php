<?php

namespace App\Http\Controllers;

use App\Models\Helli\Contact;
use App\Models\Helli\EducationalInfo;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\Helli\TeachingInfo;
use App\Models\User;
use App\Models\UserActivityLog;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;

class VueController extends Controller
{
    public function index()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token']; // دریافت توکن از پارامتر token در کوئری استرینگ
            $url = "http://api-base.ismc.ir/Redirect/GetTokenInfo?key=" . $token; // تشکیل لینک با پارامتر توکن
            $client = new Client();
            $response = $client->request('GET', $url);
            $data = json_decode($response->getBody(), true);
            if (isset($data['data']['person'])) {
                $dataPersonal = $data['data']['person'];
                $socialID = $data['data']['person']['SocialID'];
                $Gender = $data['data']['person']['Gender'];
                session(['nationalcode' => $socialID]);
                session(['gender' => $Gender]);


                $user = User::firstOrCreate([
                    'national_code' => $socialID
                ], [
                    'national_code' => $socialID,
                ]);
                session(['user_id' => $user->id]);

                $salt = random_bytes(32);
                $hash = password_hash($salt, PASSWORD_ARGON2ID);
                $pos = strpos($hash, "/");
                if ($pos !== false) {
                    $hash = str_replace("/", "", $hash);
                }
                $pos = strpos($hash, "\\");
                if ($pos !== false) {
                    $hash = str_replace("\\", "", $hash);
                }
                User::where('national_code', '=', $socialID)->update([
                    'name' => $data['data']['person']['FirstName'],
                    'family' => $data['data']['person']['LastName'],
                    'father_name' => $data['data']['person']['FatherName'],
                    'shenasname' => $data['data']['person']['IDNumber'],
                    'birthdate' => $data['data']['person']['Birthdate'],
                    'gender' => $data['data']['person']['Gender'],
                ]);

                $setToken=User::where('national_code',$socialID)->where('remember_token',null)->update(['remember_token'=>$hash]);
                if ($setToken){
                    $agent = new Agent();
                    UserActivityLog::firstorcreate([
                        'user_id' => $user['id'],
                        'activity' => 'Set Our Token => ' . $hash,
                        'ip_address' => request()->ip(),
                        'user_agent' => request()->userAgent(),
                        'device' => $agent->device(),
                    ]);
                }
                $getToken=User::where('national_code',$socialID)->value('remember_token');
                session(['token'=>$getToken]);

                Contact::firstOrCreate([
                    'national_code' => $socialID
                ], [
                    'national_code' => $socialID,
                ]);

                $contacts = Contact::where('national_code', '=', $socialID)->get();
                foreach ($contacts as $contact) {
                }
                if (empty($contact['mobile'])) {
                    Contact::where('national_code', '=', $socialID)->update([
                        'mobile' => $data['data']['contact']['Mobile'],
                    ]);
                }

                EducationalInfo::firstOrCreate([
                    'national_code' => $socialID
                ], [
                    'national_code' => $socialID,
                ]);

                TeachingInfo::firstOrCreate([
                    'national_code' => $socialID
                ], [
                    'national_code' => $socialID,
                ]);

                HelliUserMaxUploadPost::firstOrCreate([
                    'national_code' => $socialID
                ], [
                    'national_code' => $socialID,
                ]);



                $agent = new Agent();
                UserActivityLog::firstorcreate([
                    'user_id' => $user['id'],
                    'activity' => 'Login With Token => ' . $token,
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'device' => $agent->device(),
                ]);

                return view('helli');

            } else {
                $agent = new Agent();
                UserActivityLog::firstorcreate([
                    'activity' => 'Lack Of Access To Information',
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'device' => $agent->device(),
                ]);
                return redirect('http://login.ismc.ir/?refurl=https://ssmp.ismc.ir/helli', 302);
            }
        } else {
            $agent = new Agent();
            UserActivityLog::firstorcreate([
                'activity' => 'Login Without Token',
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device' => $agent->device(),
            ]);
            return redirect('http://login.ismc.ir/?refurl=https://ssmp.ismc.ir/helli', 302);
        }
    }
}
