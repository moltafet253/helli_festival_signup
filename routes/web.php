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
use App\Http\Controllers\api\GetActiveFestival;
use App\Http\Controllers\api\GetAllPosts;
use App\Http\Controllers\api\GetContacts;
use App\Http\Controllers\api\GetEducationInfo;
use App\Http\Controllers\api\GetEduInfoForPosts;
use App\Http\Controllers\api\GetPersonalImage;
use App\Http\Controllers\api\GetPersonalInfo;
use App\Http\Controllers\api\GetPost;
use App\Http\Controllers\api\GetPostInfo;
use App\Http\Controllers\api\GetPostParticipants;
use App\Http\Controllers\api\GetTeachingInfo;
use App\Http\Controllers\api\GetUserInfo;
use App\Http\Controllers\api\LastSendPosts;
use App\Http\Controllers\api\NewPost;
use App\Http\Controllers\api\PostContactInfo;
use App\Http\Controllers\api\PostEducationInfo;
use App\Http\Controllers\api\PostPersonalImage;
use App\Http\Controllers\api\PostTeachingInfo;
use App\Http\Controllers\api\UpdatePost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/helli', [VueController::class, 'index']);

//Get's
Route::middleware('CheckSession')->get('/getpersonalinfo/this/{token}', [GetPersonalInfo::class, 'getpersonalinfo']);
Route::middleware('CheckSession')->get('/contact/{token}', [GetContacts::class, 'contacts']);
Route::middleware('CheckSession')->get('/edu/{token}', [GetEducationInfo::class, 'education']);
Route::middleware('CheckSession')->get('/teaching/{token}', [GetTeachingInfo::class, 'teaching']);
Route::middleware('CheckSession')->get('/getprofileimage/this/{token}', [GetPersonalImage::class, 'getPersonalImage']);
Route::middleware('CheckSession')->get('/users/getuserinfo/{token}', [GetUserInfo::class, 'getUserInfo']);
Route::middleware('CheckSession')->get('/edu/geteduinfo/{token}', [GetEduInfoForPosts::class, 'edu']);
Route::middleware('CheckSession')->get('/getactivefestival/{token}', [GetActiveFestival::class, 'festival']);

Route::prefix('defaults')->group(function () {
    Route::middleware('CheckSession')->get('/centers/{gender}', [centers::class, 'centers']);
    Route::middleware('CheckSession')->get('/provinces/{center}/{gender}', [provinces_with_gender::class, 'provinces']);
    Route::middleware('CheckSession')->get('/cities/{center}/{province}/{gender}', [cities_with_gender::class, 'cities']);
    Route::middleware('CheckSession')->get('/schools/{center}/{province}/{city}/{gender}', [schools_with_gender::class, 'schools']);
    Route::middleware('CheckSession')->get('/research_formats', [research_formats::class, 'researchFormats']);
    Route::middleware('CheckSession')->get('/scientific_groups', [scientific_groups::class, 'scientificGroups']);
    Route::middleware('CheckSession')->get('/research_types', [research_types::class, 'researchTypes']);
    Route::middleware('CheckSession')->get('/special_sections', [special_sections::class, 'specialSections']);
    Route::middleware('CheckSession')->get('/maxUploads/{token}', [max_uploads::class, 'maxUploads']);

    //For TeachingInfo
    Route::middleware('CheckSession')->get('/provinces_without_gender/', [provinces_without_gender::class, 'provinces']);
    Route::middleware('CheckSession')->get('/cities_without_gender/{province}', [cities_without_gender::class, 'cities']);
    Route::middleware('CheckSession')->get('/schools_without_gender/{city}', [schools_without_gender::class, 'schools']);
});

//Post's
//posts group
Route::prefix('posts')->group(function () {
    Route::middleware('CheckSession')->get('/allposts/user/{token}', [GetAllPosts::class, 'getAllPosts']);
    Route::middleware('CheckSession')->get('/getPostInfo/{id}', [GetPostInfo::class, 'getPostInfo']);
    Route::middleware('CheckSession')->get('/getPostParticipants/this/{id}', [GetPostParticipants::class, 'postParticipants']);
    Route::middleware('CheckSession')->get('/getpost/{nationalcode}', [GetPost::class, 'getPost']);
    Route::middleware('CheckSession')->post('/updatepost/this', [UpdatePost::class, 'updatePost']);
    Route::middleware('CheckSession')->post('/delete/this/{id}', [DeletePost::class, 'deletePost']);
    Route::middleware('CheckSession')->post('/approve/last/send/{token}', [LastSendPosts::class, 'lastSendPosts']);
    Route::middleware('CheckSession')->post('/participant/delete/this/{id}', [DeleteParticipant::class, 'deleteParticipant']);
});

Route::middleware('CheckSession')->post('/contact/save/{token}', [PostContactInfo::class , 'postContact']);
Route::middleware('CheckSession')->post('/edu/save', [PostEducationInfo::class , 'postEducation']);
Route::middleware('CheckSession')->post('/teaching/save/{token}', [PostTeachingInfo::class , 'postTeaching']);
Route::middleware('CheckSession')->post('/upload/{token}', [PostPersonalImage::class , 'postPersonalImage']);
Route::middleware('CheckSession')->post('/sendpost/this/{token}', [NewPost::class , 'newPost']);
