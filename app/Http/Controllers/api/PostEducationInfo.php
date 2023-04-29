<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Helli\EducationalInfo;
use Illuminate\Http\Request;

class PostEducationInfo extends Controller
{
    public function postEducation(Request $request)
    {
        $national_code = $request->input('edu.0.national_code');
        $namemarkaztahsili = $request->input('edu.0.namemarkaztahsili');
        $noetahsilhozavi = $request->input('edu.0.noetahsilhozavi');
        $shparvandetahsili = $request->input('edu.0.shparvandetahsili');
        $ostantahsili = $request->input('edu.0.ostantahsili');
        $shahrtahsili = $request->input('edu.0.shahrtahsili');
        $madresetahsili = $request->input('edu.0.madresetahsili');
        $paye = $request->input('edu.0.paye');
        $sath = $request->input('edu.0.sath');
        $term = $request->input('edu.0.term');
        $markaztakhasosihozavi = $request->input('edu.0.markaztakhasosihozavi');
        $reshtedaneshgahi = $request->input('edu.0.reshtedaneshgahi');
        $tahsilatghhozavi = $request->input('edu.0.tahsilatghhozavi');
        $gender = $request->input('gender');
        switch ($gender) {
            case 'زن':
                $paye = null;
                break;
            case 'مرد':
                $sath = null;
                $term = null;
                break;
        }
        $edu = EducationalInfo::where('national_code', '=', $national_code)->update([
            'namemarkaztahsili' => $namemarkaztahsili,
            'noetahsilhozavi' => $noetahsilhozavi,
            'shparvandetahsili' => $shparvandetahsili,
            'ostantahsili' => $ostantahsili,
            'shahrtahsili' => $shahrtahsili,
            'madresetahsili' => $madresetahsili,
            'paye' => $paye,
            'sath' => $sath,
            'term' => $term,
            'markaztakhasosihozavi' => $markaztakhasosihozavi,
            'tahsilatghhozavi' => $tahsilatghhozavi,
            'reshtedaneshgahi' => $reshtedaneshgahi,
            'approved' => 1
        ]);
    }
}
