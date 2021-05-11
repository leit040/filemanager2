<?php


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

Route::get('test', function() {
  //return  Storage::disk('dropbox')->allFiles();
    Storage::move(storage_path()."/app/files/b_1540456548_iqfkgb_att-url-download.webp", public_path().'/files');
    return storage_path()."/app/"."files/111-1620581065.webp";

});
Route::post('/save',[\App\Http\Controllers\FileController::class,'store'])->name('store');
Route::get('/',[\App\Http\Controllers\FileController::class,'index'])->name('index');
Route::get('/delete/{file}',[\App\Http\Controllers\FileController::class,'destroy'])->name('destroy');
