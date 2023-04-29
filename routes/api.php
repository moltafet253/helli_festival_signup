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
use App\Http\Controllers\api\PostEducationInfo;
use App\Http\Controllers\api\PostPersonalImage;
use App\Http\Controllers\api\PostTeachingInfo;
use App\Http\Controllers\api\UpdatePost;
use Illuminate\Support\Facades\Route;


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

Route::prefix('posts')->group(function () {
    Route::post('/updatepost/this', [UpdatePost::class, 'updatePost']);
    Route::post('/delete/this/{id}', [DeletePost::class, 'deletePost']);
    Route::post('/approve/last/send/{nationCode}', [LastSendPosts::class, 'lastSendPosts']);
    Route::post('/participant/delete/this/{id}', [DeleteParticipant::class, 'deleteParticipant']);
});




//Post's
Route::post('/contact/save/{nationCode}', [PostContactInfo::class , 'postContact']);
Route::post('/edu/save', [PostEducationInfo::class , 'postEducation']);
Route::post('/teaching/save/{nationCode}', [PostTeachingInfo::class , 'postTeaching']);
Route::post('/upload/{nationCode}', [PostPersonalImage::class , 'postPersonalImage']);
Route::post('/sendpost/this/{nationalcode}', [NewPost::class , 'newPost']);








