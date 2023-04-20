<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\EducationalInfo;
use App\Models\TeachingInfo;
use App\Models\User;
use Illuminate\Http\Request;

class HelliController extends Controller
{
    public function index()
    {
//        $dataPersonal = $data['data']['person'];
//        $socialID = $data['data']['person']['SocialID'];
//        $Gender = $data['data']['person']['Gender'];
//        session()->put(['nationalcode' => $socialID]);
//        session()->put(['gender' => $Gender]);
//
//        User::firstOrCreate([
//            'national_code' => $socialID
//        ], [
//            'national_code' => $socialID,
//        ]);
//
//
//        User::where('national_code', '=', $socialID)->update([
//            'name' => $data['data']['person']['FirstName'],
//            'family' => $data['data']['person']['LastName'],
//            'father_name' => $data['data']['person']['FatherName'],
//            'shenasname' => $data['data']['person']['IDNumber'],
//            'birthdate' => $data['data']['person']['Birthdate'],
//            'gender' => $data['data']['person']['Gender'],
//        ]);
//
//        Contact::firstOrCreate([
//            'national_code' => $socialID
//        ], [
//            'national_code' => $socialID,
//        ]);
//
//        $contacts = Contact::where('national_code', '=', $socialID)->get();
//        foreach ($contacts as $contact) {
//        }
//        if (empty($contact['mobile'])) {
//            Contact::where('national_code', '=', $socialID)->update([
//                'mobile' => $data['data']['contact']['Mobile'],
//            ]);
//        }
//
//        EducationalInfo::firstOrCreate([
//            'national_code' => $socialID
//        ], [
//            'national_code' => $socialID,
//        ]);
//
//        TeachingInfo::firstOrCreate([
//            'national_code' => $socialID
//        ], [
//            'national_code' => $socialID,
//        ]);
//        return view('helli', compact('dataPersonal'));
    }
}
