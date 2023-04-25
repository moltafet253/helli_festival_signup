<?php

use App\Http\Controllers\ImageController;
use App\Models\File;
use App\Models\Helli\Contact;
use App\Models\Helli\EducationalInfo;
use App\Models\Helli\HelliUserMaxUploadPost;
use App\Models\Helli\Image;
use App\Models\Helli\Participant;
use App\Models\Helli\Post;
use App\Models\Helli\Provinces;
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
        'approved'=>1,
    ]);
});

Route::get('/edu/{nationalcode}', function (Request $request, $nationalcode) {
    $edu = DB::table('educational_infos')->where('national_code', '=', $nationalcode)->get();
    $gender = session()->get('gender');
    return [
        'edu' => $edu,
        'gender' => $gender,
    ];
});

Route::post('/edu/save', function (Request $request) {
//    return $request;
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
});

Route::middleware('CheckSession')->get('/teaching/{nationalcode}', function ($nationalcode) {
    return DB::table('teaching_infos')->where('national_code', '=', $nationalcode)->get();
});

Route::post('/teaching/save/{nationCode}', function (Request $request) {
    $national_code = $request->input('teaching.0.national_code');
    $isMaster = $request->input('teaching.0.isMaster');
    $masterCode = $request->input('teaching.0.masterCode');
    $teachingProvince = $request->input('teaching.0.teachingProvince');
    $teachingCity = $request->input('teaching.0.teachingCity');
    $teachingPlaceName = $request->input('teaching.0.teachingPlaceName');
    $teaching = TeachingInfo::where('national_code', '=', $national_code)->update([
        'isMaster' => $isMaster,
        'masterCode' => $masterCode,
        'teachingProvince' => $teachingProvince,
        'teachingCity' => $teachingCity,
        'teachingPlaceName' => $teachingPlaceName,
        'approved' => 1,
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
    if ($id) {
        $path = Image::find($id);
        $src = $path->src;
        if (!User::exists($path)) {
            abort(404);
        }
        $profileUrl = Storage::url($src);
        return response()->json(['imageSrc' => $profileUrl]);
    }


    return '';
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

Route::middleware('CheckSession')->get('/posts/allposts/user/{nationalcode}', function ($nationalcode) {
    $user_id = DB::table('users')->where('national_code', $nationalcode)->value('id');
    $user = User::findOrFail($user_id);
    $posts = $user->posts()->orderBy('id', 'desc')->get();
    return response()->json(['posts' => $posts]);
});


//For Posts.vue

//New Post
Route::post('/sendpost/this/{nationalcode}', function (Request $request, $nationalcode) {
    $user_id = DB::table('users')->where('national_code', $nationalcode)->value('id');
    $festival_title = DB::table('festivals')->where('active', 1)->value('title');
    $decrementBy=1;

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
        'file_src' => $path
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
        HelliUserMaxUploadPost::where('national_code', '=', $cooperators[$c]['codemeli'])->decrement('numbers', $decrementBy);
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
        $c = 2;
        for ($i = 2; $i <= $count; $i++) {
            HelliUserMaxUploadPost::where('national_code', '=', $cooperators[$c += 6]['codemeli'])->decrement('numbers', $decrementBy);
        }

    }


});

//Delete Post
Route::post('/posts/delete/this/{id}', function ($id) {
    if ($id) {
        $incrementBy = 1;
        $post = Post::find($id);
        if ($post['activity_type'] == 'moshtarak') {
            $participants = $post->moshtarakan;
            foreach ($participants as $items) {
                HelliUserMaxUploadPost::where('national_code', '=', $items->national_code)->increment('numbers', $incrementBy);
            }
        }
        $mainUser = User::find($post['user_id'])->value('national_code');
        HelliUserMaxUploadPost::where('national_code', '=', $mainUser)->increment('numbers', $incrementBy);
    }
});
Route::post('/posts/approve/last/send/{nationCode}', function (Request $request, $nationCode) {
//    return $nationCode;
    if ($request->input('approved') == 1) {
        $maxUpload = HelliUserMaxUploadPost::where('national_code', '=', $nationCode)->update([
            'sent_status' => 1,
            'numbers' => 0,
        ]);
    }

    if (!$maxUpload) {
        return response()->json(['errors' => 'Empty File'], 422);
    }
});

Route::prefix('defaults')->group(function () {
    Route::get('/centers/{gender}', function ($gender) {
        $centers = Provinces::select('markaz')
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('markaz', 'asc')
            ->get();
        return response()->json($centers);

    });
    Route::get('/provinces/{center}/{gender}', function ($center, $gender) {
        $provinces = Provinces::select('ostan')
            ->where('markaz', '=', $center)
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('ostan', 'asc')
            ->get();
        return response()->json($provinces);
    });
    Route::get('/cities/{center}/{province}/{gender}', function ($center, $province, $gender) {
        $cities = Provinces::select('shahr')
            ->where('markaz', '=', $center)
            ->where('ostan', '=', $province)
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('shahr', 'asc')
            ->get();
        return response()->json($cities);
    });
    Route::get('/schools/{center}/{province}/{city}/{gender}', function ($center, $province, $city, $gender) {
        $cities = Provinces::select('madrese')
            ->where('markaz', '=', $center)
            ->where('ostan', '=', $province)
            ->where('shahr', '=', $city)
            ->where('gender', '=', $gender)
            ->distinct()
            ->orderBy('madrese', 'asc')
            ->get();
        return response()->json($cities);
    });
    Route::get('/research_formats', function () {
        $research_formats = DB::table('research_formats')
            ->get()
            ->where('active', '=', 1);
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
    Route::get('/maxUploads/{nationCode}', function ($nationCode) {
        $max_upload = DB::table('helli_user_max_upload_posts')->get()->where('national_code', '=', $nationCode);
        return $max_upload;
    });

    //For TeachingInfo
    Route::get('/provinces/', function () {
        $provinces = Provinces::select('ostan')
            ->distinct()
            ->orderBy('ostan', 'asc')
            ->get();
        return response()->json($provinces);
    });
    Route::get('/cities/{province}', function ($province) {
        $cities = Provinces::select('shahr')
            ->where('ostan', '=', $province)
            ->distinct()
            ->orderBy('shahr', 'asc')
            ->get();
        return response()->json($cities);
    });
    Route::get('/schools/{city}', function ($city) {
        $cities = Provinces::select('madrese')
            ->where('shahr', '=', $city)
            ->distinct()
            ->orderBy('madrese', 'asc')
            ->get();
        return response()->json($cities);
    });
});



