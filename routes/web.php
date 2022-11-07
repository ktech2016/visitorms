<?php
use App\Http\Controllers\usersController;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\visitorsController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\viewController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\timeOutController;
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
Route::get('/templete', function () {
    return view('layouts.master');
});
//dashboard route
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
    //view users Route
    Route::get('user/view_users',[viewController::class, 'view_users'])->name('view_users');
    //view visitors Route
    Route::get('user/view_visitors',[viewController::class, 'view_visitors'])->name('view_visitors');
    //view staff Route
    Route::get('user/view_staff',[viewController::class, 'view_staff'])->name('view_staff');
    //Logout Route
    Route::get('/user/logout', [usersController::class, 'logout'])->name('user.logout');
    Route::middleware(['auth:sanctum'])->group(function () {
  //Dashboard
   //Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    //users
    Route::resource('/user', usersController::class);
    //Staffs Route
    Route::resource('/employee', employeesController::class);
    
    //visitor Route
    Route::resource('/home', homeController::class);
    //department Route
    Route::resource('/department', departmentController::class);
    //timeout Route
    Route::resource('/timeout', timeOutController::class);
   });
   Route::match(['get','post'],'/submitmailnotify', 'App\Http\Controllers\homeController@sumbmitvisitorsNotificationMail')->name('submitmailnotify');

    
