<?php

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

Route::get('/', function () {
    return view('first');
});

Route::get('secound', function () {
    return view('secound');
});

Route::get('home', function () {
    return view('home');
});

//register first step
// Route::get('/register', ['uses' => 'VendorDataController@index'])->name('vendor.index');



//register first step
Route::get('/step-1', ['uses' => 'VendorDataController@step1'])->name('vendor.step1');
Route::post('/step-1', ['uses' => 'VendorDataController@poststep1'])->name('vendor.post.step1');

//register second step
Route::get('/step-2', ['uses' => 'VendorDataController@step2'])->name('vendor.step2');
Route::post('/step-2', ['uses' => 'VendorDataController@poststep2'])->name('vendor.post.step2');

//register third step
Route::get('/step-3', ['uses' => 'VendorDataController@step3'])->name('vendor.step3');
Route::post('/step-3', ['uses' => 'VendorDataController@poststep3'])->name('vendor.post.step3');

//register fourth step
Route::get('/step-4', ['uses' => 'VendorDataController@step4'])->name('vendor.step4');
Route::post('/step-4', ['uses' => 'VendorDataController@poststep4'])->name('vendor.post.step4');

//register fifth step
Route::get('/step-5', ['uses' => 'VendorDataController@step5'])->name('vendor.step5');
Route::post('/step-5', ['uses' => 'VendorDataController@poststep5'])->name('vendor.post.step5');

//ajax request fifth step

Route::post('/sendMotp', 'VendorDataController@resendMobileOtp')->name('vendor.mobile.resend');
Route::post('/sendEotp', 'VendorDataController@resendEmailOtp')->name('vendor.email.resend');

// //register sixth step
Route::get('/success', ['uses' => 'VendorDataController@step6'])->name('vendor.step6');
// Route::post('/step-6', ['uses' => 'VendorDataController@poststep6'])->name('vendor.post.step6');

//register vendor route//
Route::post('register/success', ['uses' => 'VendorDataController@store'])->name('vendor.post');


//Clear route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});