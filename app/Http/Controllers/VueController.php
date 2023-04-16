<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\EducationalInfo;
use App\Models\TeachingInfo;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VueController extends Controller
{
    public function index()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token']; // دریافت توکن از پارامتر token در کوئری استرینگ
            $url = "http://api-base.ismc.ir/Redirect/GetTokenInfo?key=" . $token; // تشکیل لینک با پارامتر توکن
            $client = new Client();
            $response = $client->request('GET', 'http://api-base.ismc.ir/Redirect/GetTokenInfo?key=' . $token);
            $data = json_decode($response->getBody(), true);
            if (isset($data['data']['person'])) {
                $dataPersonal = $data['data']['person'];
                $socialID = $data['data']['person']['SocialID'];
                $Gender = $data['data']['person']['Gender'];
//                $Gender = 'زن';
                session()->put(['nationalcode' => $socialID]);
                session()->put(['gender' => $Gender]);

                User::firstOrCreate([
                    'national_code' => $socialID
                ], [
                    'national_code' => $socialID,
                ]);


                User::where('national_code', '=', $socialID)->update([
                    'name' => $data['data']['person']['FirstName'],
                    'family' => $data['data']['person']['LastName'],
                    'father_name' => $data['data']['person']['FatherName'],
                    'shenasname' => $data['data']['person']['IDNumber'],
                    'birthdate' => $data['data']['person']['Birthdate'],
                    'gender' => $data['data']['person']['Gender'],
                ]);

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

                return view('index', compact('dataPersonal'));
            } else {
                return redirect('http://login.ismc.ir/?refurl=http://ssmp.ismc.ir', 302);
            }
        } else {
            return redirect('http://login.ismc.ir/?refurl=http://ssmp.ismc.ir', 302);
        }
//        $client = new Client();
//        $response = $client->request('GET', 'http://api-base.ismc.ir/Redirect/GetTokenInfo?key=77985308-E13F-4DC1-9648-9740345177C7');
//        $data = json_decode($response->getBody(), true);
//        $dataPersonal=$data['data']['person'];
//        return view('index',compact('dataPersonal'));
    }
}
