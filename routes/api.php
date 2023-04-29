<?php

use App\Http\Controllers\api\defaults\centers;
use App\Http\Controllers\api\defaults\cities_with_gender;
use App\Http\Controllers\api\defaults\cities_without_gender;
use App\Http\Controllers\api\defaults\max_uploads;
use App\Http\Controllers\api\defaults\provinces_with_gender;
use App\Http\Controllers\api\defaults\provinces_without_gender;
use App\Http\Controllers\api\defaults\research_formats;
use App\Http\Controllers\api\defaults\research_types;
use App\Http\Controllers\api\defaults\schools_with_gender;
use App\Http\Controllers\api\defaults\schools_without_gender;
use App\Http\Controllers\api\defaults\scientific_groups;
use App\Http\Controllers\api\defaults\special_sections;
use App\Http\Controllers\api\DeleteParticipant;
use App\Http\Controllers\api\DeletePost;
use App\Http\Controllers\api\GetAllPosts;
use App\Http\Controllers\api\GetContacts;
use App\Http\Controllers\api\GetEducationInfo;
use App\Http\Controllers\api\GetEduInfoForPosts;
use App\Http\Controllers\api\GetPersonalImage;
use App\Http\Controllers\api\GetPost;
use App\Http\Controllers\api\GetPostInfo;
use App\Http\Controllers\api\GetPostParticipants;
use App\Http\Controllers\api\GetTeachingInfo;
use App\Http\Controllers\api\GetUserInfo;
use App\Http\Controllers\api\LastSendPosts;
use App\Http\Controllers\api\NewPost;
use App\Http\Controllers\api\PostContactInfo;
use App\Http\Controllers\api\PostPersonalImage;
use App\Http\Controllers\api\PostTeachingInfo;
use App\Http\Controllers\api\UpdatePost;
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

//Get's
Route::middleware('CheckSession')->get('/contact/{nationalcode}', [GetContacts::class , 'contacts']);
Route::middleware('CheckSession')->get('/edu/{nationalcode}', [GetEducationInfo::class , 'education']);
Route::middleware('CheckSession')->get('/teaching/{nationalcode}', [GetTeachingInfo::class , 'teaching']);
Route::middleware('CheckSession')->get('/getprofileimage/this/{nationalcode}', [GetPersonalImage::class , 'getPersonalImage']);
Route::middleware('CheckSession')->get('/users/getuserinfo/{nationalcode}', [GetUserInfo::class , 'getUserInfo']);
Route::middleware('CheckSession')->get('/edu/geteduinfo/{nationalcode}', [GetEduInfoForPosts::class , 'edu']);

Route::prefix('posts')->group(function () {
    Route::middleware('CheckSession')->get('/allposts/user/{nationalcode}', [GetAllPosts::class , 'getAllPosts']);
    Route::middleware('CheckSession')->get('/getPostInfo/{id}', [GetPostInfo::class , 'getPostInfo']);
    Route::middleware('CheckSession')->get('/getPostParticipants/this/{id}', [GetPostParticipants::class , 'postParticipants']);
    Route::middleware('CheckSession')->get('/getpost/{nationalcode}', [GetPost::class , 'getPost']);
    Route::post('/updatepost/this', [UpdatePost::class , 'updatePost']);
    Route::post('/delete/this/{id}', [DeletePost::class , 'deletePost']);
    Route::post('/approve/last/send/{nationCode}', [LastSendPosts::class , 'lastSendPosts']);
    Route::post('/participant/delete/this/{id}', [DeleteParticipant::class , 'deleteParticipant']);

});

Route::prefix('defaults')->group(function () {
    Route::get('/centers/{gender}', [centers::class , 'centers']);
    Route::get('/provinces/{center}/{gender}', [provinces_with_gender::class , 'provinces']);
    Route::get('/cities/{center}/{province}/{gender}', [cities_with_gender::class , 'cities']);
    Route::get('/schools/{center}/{province}/{city}/{gender}', [schools_with_gender::class , 'schools']);
    Route::get('/research_formats', [research_formats::class , 'researchFormats']);
    Route::get('/scientific_groups', [scientific_groups::class , 'scientificGroups']);
    Route::get('/research_types', [research_types::class , 'researchTypes']);
    Route::get('/special_sections', [special_sections::class , 'specialSections']);
    Route::get('/maxUploads/{nationCode}', [max_uploads::class , 'maxUploads']);

    //For TeachingInfo
    Route::get('/provinces_without_gender/', [provinces_without_gender::class , 'provinces']);
    Route::get('/cities_without_gender/{province}', [cities_without_gender::class , 'cities']);
    Route::get('/schools_without_gender/{city}', [schools_without_gender::class , 'schools']);
});


//Post's
Route::post('/contact/save/{nationCode}', [PostContactInfo::class , 'postContact']);
Route::post('/edu/save', [PostContactInfo::class , 'postEducation']);
Route::post('/teaching/save/{nationCode}', [PostTeachingInfo::class , 'postTeaching']);
Route::post('/upload/{nationCode}', [PostPersonalImage::class , 'postPersonalImage']);
Route::post('/sendpost/this/{nationalcode}', [NewPost::class , 'newPost']);








