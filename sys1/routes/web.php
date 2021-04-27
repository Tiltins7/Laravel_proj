<?php

use App\Http\Controllers\sheepsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/animal_species', function () {
    return view('animal_species');
})->middleware('auth');


Route::group(['prefix' => 'animal_species', 'middleware' => 'auth'], function () {
    Route::get('/sheeps', [sheepsController::class, "index"])->name('sheeps');
    Route::post('/submit', [sheepsController::class, "save"])->name('sumbit');
    Route::get('animal_species/sheeps/{sheep_id}/delete', [sheepsController::class, "destroy"]);
});

Route::resource('sheeps', 'SheepsController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show', 'create', 'store']]);

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
