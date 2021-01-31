<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
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
    return view('welcome');
});
Route::get('/form_view',[MasterController::class,'form_view'])->name('form_view');
Route::post('/form_submit',[MasterController::class,'form_submit'])->name('form_submit');
Route::get('table',[MasterController::class,'table_view'])->name('table_view');
Route::get('/delete_data/{id}',[MasterController::class,'delete_data'])->name('delete_data');
Route::post('/form_update',[MasterController::class,'form_update'])->name('form_update');
Route::get('/edit_data/{id}',[MasterController::class,'edit_data'])->name('edit_data');
Route::get('/check',[MasterController::class,'relation'])->name('check');
Route::get('/show',[MasterController::class,'form_show'])->name('form_show');
Route::post('/form_many',[MasterController::class,'form_many'])->name('form_many');
Route::get('/show_fuck',[MasterController::class,'show_fuck']);
Route::get('detach/{id}',[MasterController::class,'detach']);
