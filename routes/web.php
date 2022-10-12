<?php

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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');
    Route::post('/archives/ganti', [\App\Http\Controllers\ArchiveController::class, 'uploadFile'])->name('archive.ganti');
    Route::resource('/archives', \App\Http\Controllers\ArchiveController::class);
    Route::get('/download/{filename}', function ($filename) {
        $header = array(
            'Content-Type: application/pdf',
        );
        return Storage::download('public/' . $filename, $filename, $header);
    })->name('download');
    Route::view('/about', 'about.index')->name('about');
});
