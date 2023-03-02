<?php

use App\Http\Controllers\AdminController;
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


Route::prefix('cms/admin/')->group(function(){
    // Route::view('' , 'cms.home');
    Route::view('' , 'cms.parent');
    Route::view('temp' , 'cms.temp');
    Route::resource('admins' , AdminController::class);
    Route::post('update-admins/{id}' , [AdminController::class , 'update'])->name('update-admins');

    Route::resource('companies_' , CompanyController::class);
    Route::post('update-admins/{id}' , [CompanyController::class , 'update'])->name('update-admins');
});
