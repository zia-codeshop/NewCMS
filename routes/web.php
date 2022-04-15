<?php

use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('isAdmin');
//Route::get('/live_search/action', [SearchController::class, 'action'])->name('live_search.action');


Route::group(['prefix' => '/admin', 'middleware' => 'isAdmin', 'as' => 'admin.'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile/{user}', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile/update/{user}', [DashboardController::class, 'profileUpdate'])->name('profile.update');
    Route::put('/password/change/{user}', [DashboardController::class, 'passwordChange'])->name('password.change');

    Route::get('/siteInformation', [DashboardController::class, 'siteInformation'])->name('siteInformation');
    Route::put('/logos/update', [DashboardController::class, 'logosUpdate'])->name('logos.update');
    Route::put('/siteInformation/update', [DashboardController::class, 'siteInformationUpdate'])->name('siteInformation.update');

    Route::resource('/agents', AgentController::class);
    Route::resource('/customers', CustomerController::class);
});
