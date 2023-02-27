<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\IinsuranceController;
use App\Http\Controllers\PageControllers;
use App\Http\Controllers\UserManagement;
use App\Http\Controllers\UsersLoginSignup;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageControllers::class, 'indexPage']);

Route::get('/how-it-work', [PageControllers::class, 'howitworksPage']);

Route::get('/reviews', [PageControllers::class, 'reviewsPage']);

Route::get('/all-reviews', [PageControllers::class, 'allreviewsPage']);

Route::get('/blogs', [BlogsController::class, 'blogsPage']);

Route::get('/blogs/{articlesno}/{blogtitle}', [BlogsController::class, 'ParticularBlogPage']);

Route::get('/help_support', [PageControllers::class, 'help_supportPage']);

Route::get('/about', [PageControllers::class, 'aboutPage']);

Route::get('/dispatchers', [PageControllers::class, 'dispatchersPage']);

Route::get('/privacy-policy', [PageControllers::class, 'privacyPage']);

Route::get('/terms-conditions', [PageControllers::class, 'termsPage']);




//users login Signup
Route::get('/login', [UsersLoginSignup::class, 'loginPage']);

Route::get('/password-settings', [UsersLoginSignup::class, 'forgetPassPage']);

Route::get('/sign-up', [UsersLoginSignup::class, 'signupPage']);

Route::post('/signup-new-user', [UsersLoginSignup::class, 'signupNewUser']);

Route::get('/user-verification', [UsersLoginSignup::class, 'showOTPpage']);

Route::post('/verify-user-with-otp', [UsersLoginSignup::class, 'verifySignUpOtp']);

Route::get('/users/logout', [UsersLoginSignup::class, 'logoutUser']);

Route::post('/user-login-method', [UsersLoginSignup::class, 'loginExistingUser']);

Route::post('/change--users-password', [UsersLoginSignup::class, 'changeUsersPassword']);

Route::post('/verify-opt-for-changong-password', [UsersLoginSignup::class, 'crossCheckPassChangeOTP']);







// google login sugnup
Route::get('/google-login', [GoogleController::class, 'redirectToGoogle']);

Route::get('/google-signup', [GoogleController::class, 'redirectToGoogle']);

Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);






// all users managements | User Pages 
Route::get('/users/dashboard', [UserManagement::class, 'dashboard'])->middleware('userlogedIn');

Route::post('/send-email', [UserManagement::class, 'sendEmail']);

Route::post('/users/add-new-insurance', [IinsuranceController::class, 'addNewInsurance'])->middleware('userlogedIn');

Route::get('/users/insurances', [IinsuranceController::class, 'myInsurances'])->middleware('userlogedIn');

Route::get('/users/insurance-no-{insuranceNo}', [IinsuranceController::class, 'particularInsurance'])->middleware('userlogedIn');



// get blog
Route::get('/get-blog-{blogdata}', [BlogsController::class, 'showSpecBlog']);









// artisan routes 
Route::get('/cache', function () {
    Artisan::call('cache:clear');
});


Route::get('/storage', function () {
    Artisan::call('storage:link');
});


Route::get('/config', function () {
    Artisan::call('config:cache');
});
