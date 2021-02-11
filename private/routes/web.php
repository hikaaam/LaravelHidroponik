<?php

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
use App\Mail\otpEmails;
use App\Mail\Notif;
use Illuminate\Support\Facades\Mail;

Route::resource('/', 'FrontController');
Route::resource('/account', 'AccountController');
Route::get('statistik/{id}/status/{status}/sensor/{sensor}', [
    'as' => 'statistik', 'uses' => 'StatistikController@statistik']);
Route::resource('/stat', 'StatistikController');
Route::resource('/prototype', 'PrototypeController');
Route::resource('/home', 'HomeController');
Route::resource('/mobileAuth', 'MobileAuthController');
Route::get('notif/{id}/status/{status}/isi/{isi}', [
    'as' => 'notif', 'uses' => 'MobileNotificationController@notif']);
// Route::get('/email',function(){
//     $data = ['data'=>'anjing'];
//     // Mail::to('andrenuryana@gmail.com')->Send(new otpEmails($data));
//     return new otpEmails($data);
// });
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('logout',function(){
//     Auth::logout();
//     return redirect()->back();
// });