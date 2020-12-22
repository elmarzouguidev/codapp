<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Mail\EmailForQueuing;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
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

Route::webhooks('webhooks');

Route::post('/hooker',[TestController::class,'postHook']);
Route::get('/te',function(){
   // return app(App\Settings\GeneralSettings::class)->hookCSRF;
   return base64_encode( hash_hmac( 'sha256', '$payload', 'wx66@ofg33', true ) );
});

Route::get('/register', [HomeController::class, 'registerGet'])->name('registerGet');
Route::post('/register', [HomeController::class, 'register'])->name('register');

Route::get('/good', [HomeController::class, 'goodP'])->name('goodGet');
Route::post('/good', [HomeController::class, 'good'])->name('good');


Route::get('/mail',function(){

   $email = new EmailForQueuing();
   Mail::to('admin@admin.com')->send($email);
});


/**** */



