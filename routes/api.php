<?php

use App\Http\Controllers\ImageController;
use App\Models\File;
use App\Models\Helli\Contact;
use App\Models\Helli\EducationalInfo;
use App\Models\Helli\Image;
use App\Models\Helli\TeachingInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('CheckSession')->get('/contact/{nationalcode}', function ($nationalcode) {
    return DB::table('contacts')->where('national_code', '=', $nationalcode)->get();
});

Route::post('/contact/save/{nationCode}', function (Request $request, $nationCode) {
    $phone = $request->input('contact.0.phone');
    $mobile = $request->input('contact.0.mobile');
    $address = $request->input('contact.0.address');
    $postal_code = $request->input('contact.0.postal_code');
    $contact = Contact::where('national_code', '=', $nationCode)->update([
        'phone' => $phone,
        'mobile' => $mobile,
        'address' => $address,
        'postal_code' => $postal_code,
    ]);
});

Route::get('/edu/{nationalcode}', function (Request $request, $nationalcode) {
    $edu = DB::table('educational_infos')->where('national_code', '=', $nationalcode)->get();
    $gender = session()->get('gender');
    return [
        'edu' => $edu,
        'gender' => $gender
    ];
});

Route::post('/edu/save/{nationCode}', function (Request $request) {
//    echo $request;
    $national_code = $request->input('edu.0.national_code');
    $namemarkaztahsili = $request->input('edu.0.namemarkaztahsili');
    $noetahsilhozavi = $request->input('edu.0.noetahsilhozavi');
    $shparvandetahsili = $request->input('edu.0.shparvandetahsili');
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
        'paye' => $paye,
        'sath' => $sath,
        'term' => $term,
        'markaztakhasosihozavi' => $markaztakhasosihozavi,
        'tahsilatghhozavi' => $tahsilatghhozavi,
        'reshtedaneshgahi' => $reshtedaneshgahi,
    ]);
});

Route::middleware('CheckSession')->get('/teaching/{nationalcode}', function ($nationalcode) {
    return DB::table('teaching_infos')->where('national_code', '=', $nationalcode)->get();
});

Route::post('/teaching/save/{nationCode}', function (Request $request) {
    $national_code = $request->input('teaching.0.national_code');
    $isMaster = $request->input('teaching.0.isMaster');
    $masterCode = $request->input('teaching.0.masterCode');
    $teachingLocation = $request->input('teaching.0.teachingLocation');
    $teachingPlaceName = $request->input('teaching.0.teachingPlaceName');
    $teaching = TeachingInfo::where('national_code', '=', $national_code)->update([
        'isMaster' => $isMaster,
        'masterCode' => $masterCode,
        'teachingLocation' => $teachingLocation,
        'teachingPlaceName' => $teachingPlaceName,
    ]);
    return $teaching;
});


Route::post('/upload/{nationCode}', function (Request $request, $nationCode) {
    $file = $request->file('file');
    if ($file and $nationCode) {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,bmp|max:2048|dimensions:min_width=128,min_height=128',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $filename = $file->getClientOriginalName();
        $hashName = uniqid('', true) . '.' . $request->file('file')->getClientOriginalName();
        $path = $file->storeAs('public/profile_images', $hashName);


        $imageTable = Image::Create([
            'name' => $filename,
            'src' => $path,
        ]);

        if ($imageTable) {
            User::where('national_code', '=', $nationCode)->update([
                'personalImageSrc' => $imageTable->id,
            ]);
        }
        return response()->json(['message' => 'فایل با موفقیت ارسال شد.']);
    }
});

Route::get('/getprofileimage/this/{nationalcode}', function ($nationalcode) {
    $id = DB::table('users')->where('national_code', $nationalcode)->value('personalImageSrc');
    $path = Image::find($id);
    $src = $path->src;
    if (!User::exists($path)) {
        abort(404);
    }
    $profileUrl = Storage::url($src);
    return response()->json(['imageSrc' => $profileUrl]);
});

Route::middleware('CheckSession')->get('/posts/getpost/{nationalcode}', function ($nationalcode) {
    return DB::table('posts')->where('national_code', '=', $nationalcode)->get();
});

Route::middleware('CheckSession')->get('/users/getuserinfo/{nationalcode}', function ($nationalcode) {
    return DB::table('users')->where('national_code', '=', $nationalcode)->get();
});

Route::middleware('CheckSession')->get('/edu/geteduinfo/{nationalcode}', function ($nationalcode) {
    return DB::table('educational_infos')->where('national_code', '=', $nationalcode)->get();
});


Route::prefix('defaults')->group(function () {
    Route::get('/provinces', function () {
        $provinces = DB::table('provinces')->get()->where('parent', '=', 0);
//    foreach ($provinces as $info){
//        return $parent=$info['id'];
//        $cities = DB::table('provinces')->get()->where('parent','=',$parent);
//        return $cities;
//    }
        return $provinces;

    });
    Route::get('/research_formats', function () {
        $research_formats = DB::table('research_formats')->get()->where('active', '=', 1);
        return $research_formats;
    });
    Route::get('/scientific_groups', function () {
        $scientific_groups = DB::table('scientific_groups')->get()->where('active', '=', 1);
        return $scientific_groups;
    });
    Route::get('/research_types', function () {
        $research_types = DB::table('research_types')->get()->where('active', '=', 1);
        return $research_types;
    });
    Route::get('/special_sections', function () {
        $special_sections = DB::table('special_sections')->get()->where('active', '=', 1);
        return $special_sections;
    });
});



