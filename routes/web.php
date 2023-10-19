<?php

use App\Http\Controllers\ArrayController;
use App\Http\Controllers\GroupByOwnerController;
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
    return view('welcome');
});


Route::controller(ArrayController::class)->group(function () {
    Route::get('/get-input',  'index')->name('arrayinput');
    Route::post('/find-duplicates', 'findDuplicates')->name('findDuplicates');
});
Route::controller(GroupByOwnerController::class)->group(function () {
    Route::get('/process-data', 'processData')->name('processData');
});
