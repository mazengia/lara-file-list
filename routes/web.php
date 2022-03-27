<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\system;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    redirect('/login');
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post("save_system",[system::class,"saveSystem"]);
Route::get('home',[system::class,"index"]);
Route::post('update_system',[system::class,"updateSystem"]);
Route::get('file',[system::class,"downloadDBFile"])->name('file');

Route::get('zip-download',[system::class,"zipDownloadDb"])->name('zip-download');

Route::post('save_75', [system::class, "saveTo75"]);
Route::get('/image',  [system::class, "in"]);
Route::post('/store',  [system::class, "st"]);
Route::get('/cc',function (){
});
