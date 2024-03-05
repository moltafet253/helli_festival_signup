<?php

use App\Http\Controllers\api\DataEntryConfirmationController;
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
use App\Http\Controllers\api\defaults\specialized_centers;
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
use App\Http\Controllers\ExcelExport;
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
Route::middleware('CheckSession')->group(function () {
    Route::get('/getConfirmationToDataEntry', [DataEntryConfirmationController::class, 'getDataEntryConfirmation']);
    Route::post('/confirmDataEntry', [DataEntryConfirmationController::class, 'confirmDataEntry']);

    Route::get('/getpersonalinfo/this/{token}', [GetPersonalInfo::class, 'getpersonalinfo']);
    Route::get('/contact/{token}', [GetContacts::class, 'contacts']);
    Route::get('/edu/{token}', [GetEducationInfo::class, 'education']);
    Route::get('/teaching/{token}', [GetTeachingInfo::class, 'teaching']);
    Route::get('/getprofileimage/this/{token}', [GetPersonalImage::class, 'getPersonalImage']);
    Route::get('/users/getuserinfo/{token}', [GetUserInfo::class, 'getUserInfo']);
    Route::get('/edu/geteduinfo/{token}', [GetEduInfoForPosts::class, 'edu']);
    Route::get('/getactivefestival/{token}', [GetActiveFestival::class, 'festival']);

    Route::prefix('defaults')->group(function () {
        Route::get('/centers/{gender}', [centers::class, 'centers']);
        Route::get('/provinces/{center}/{gender}', [provinces_with_gender::class, 'provinces']);
        Route::get('/cities/{center}/{province}/{gender}', [cities_with_gender::class, 'cities']);
        Route::get('/schools/{center}/{province}/{city}/{gender}', [schools_with_gender::class, 'schools']);
        Route::get('/research_formats', [research_formats::class, 'researchFormats']);
        Route::get('/scientific_groups', [scientific_groups::class, 'scientificGroups']);
        Route::get('/research_types', [research_types::class, 'researchTypes']);
        Route::get('/special_sections', [special_sections::class, 'specialSections']);
        Route::get('/specializedcenters', [specialized_centers::class, 'specialCenters']);
        Route::get('/maxUploads/{token}', [max_uploads::class, 'maxUploads']);

        Route::get('/provinces_without_gender/', [provinces_without_gender::class, 'provinces']);
        Route::get('/cities_without_gender/{province}', [cities_without_gender::class, 'cities']);
        Route::get('/schools_without_gender/{city}', [schools_without_gender::class, 'schools']);
    });

    Route::prefix('posts')->group(function () {
        Route::get('/allposts/user/{token}', [GetAllPosts::class, 'getAllPosts']);
        Route::get('/getPostInfo/{id}', [GetPostInfo::class, 'getPostInfo']);
        Route::get('/getPostParticipants/this/{id}', [GetPostParticipants::class, 'postParticipants']);
        Route::get('/getpost/{nationalcode}', [GetPost::class, 'getPost']);
        Route::post('/updatepost/this', [UpdatePost::class, 'updatePost']);
        Route::post('/delete/this/{id}', [DeletePost::class, 'deletePost']);
        Route::post('/approve/last/send/{token}', [LastSendPosts::class, 'lastSendPosts']);
        Route::post('/participant/delete/this/{id}', [DeleteParticipant::class, 'deleteParticipant']);
    });

    Route::post('/contact/save/{token}', [PostContactInfo::class, 'postContact']);
    Route::post('/edu/save', [PostEducationInfo::class, 'postEducation']);
    Route::post('/teaching/save/{token}', [PostTeachingInfo::class, 'postTeaching']);
    Route::post('/upload/{token}', [PostPersonalImage::class, 'postPersonalImage']);
    Route::post('/sendpost/this/{token}', [NewPost::class, 'newPost']);
});


//Excel Export Routes
//Route::prefix('export')->group(function () {
//    Route::get('/allPosts/{username}/{password}/{festival}', [ExcelExport::class, 'allPostsByFestival']);
//    Route::get('/allUsers', [ExcelExport::class, 'allUsers']);
//});
