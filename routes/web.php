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
Route::get('/', [VueController::class, 'index']);

//Get's
Route::get('/contact/{nationalcode}', [GetContacts::class, 'contacts']);
Route::get('/edu/{nationalcode}', [GetEducationInfo::class, 'education']);
Route::get('/teaching/{nationalcode}', [GetTeachingInfo::class, 'teaching']);
Route::get('/getprofileimage/this/{nationalcode}', [GetPersonalImage::class, 'getPersonalImage']);
Route::get('/users/getuserinfo/{nationalcode}', [GetUserInfo::class, 'getUserInfo']);
Route::get('/edu/geteduinfo/{nationalcode}', [GetEduInfoForPosts::class, 'edu']);

Route::prefix('posts')->group(function () {
    Route::get('/allposts/user/{nationalcode}', [GetAllPosts::class, 'getAllPosts']);
    Route::get('/getPostInfo/{id}', [GetPostInfo::class, 'getPostInfo']);
    Route::get('/getPostParticipants/this/{id}', [GetPostParticipants::class, 'postParticipants']);
    Route::get('/getpost/{nationalcode}', [GetPost::class, 'getPost']);
});

Route::prefix('defaults')->group(function () {
    Route::get('/centers/{gender}', [centers::class, 'centers']);
    Route::get('/provinces/{center}/{gender}', [provinces_with_gender::class, 'provinces']);
    Route::get('/cities/{center}/{province}/{gender}', [cities_with_gender::class, 'cities']);
    Route::get('/schools/{center}/{province}/{city}/{gender}', [schools_with_gender::class, 'schools']);
    Route::get('/research_formats', [research_formats::class, 'researchFormats']);
    Route::get('/scientific_groups', [scientific_groups::class, 'scientificGroups']);
    Route::get('/research_types', [research_types::class, 'researchTypes']);
    Route::get('/special_sections', [special_sections::class, 'specialSections']);
    Route::get('/maxUploads/{nationCode}', [max_uploads::class, 'maxUploads']);

    //For TeachingInfo
    Route::get('/provinces_without_gender/', [provinces_without_gender::class, 'provinces']);
    Route::get('/cities_without_gender/{province}', [cities_without_gender::class, 'cities']);
    Route::get('/schools_without_gender/{city}', [schools_without_gender::class, 'schools']);
});
