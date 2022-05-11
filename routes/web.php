<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DynamicCdrController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CdrController;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\Admin\DynamicPeopleController;
use App\Http\Controllers\ProjectReportController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\DynamicProjectController;
use App\Http\Controllers\Admin\DynamicJournalController;
use App\Http\Controllers\JournalReportController;
use App\Http\Controllers\Admin\WinCdrController;
use App\Http\Controllers\Admin\ReleaseCdrController;

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

Route::get('/', [DashboardController::class, 'welcome']);


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



    Route::get('/people/create', [DynamicPeopleController::class, 'index'])->name('dynamic-people.create');
    Route::post('/people/create', [DynamicPeopleController::class, 'customPeopleCreate'])->name('dynamic-people.create');
    Route::resource('/peoples', PeopleController::class);

    Route::get('/cdr/create', [DynamicCdrController::class, 'index'])->name('dynamic-cdr.create');
    Route::post('/cdr/create', [DynamicCdrController::class, 'customCdrCreate'])->name('dynamic-cdr.create');
    Route::get('/cdd/{name}', [ReleaseCdrController::class, 'release'])->name('cdrs.releaseUpdate');
    Route::get('/cdr/{name}', [WinCdrController::class, 'win'])->name('cdrs.winUpdate');
    Route::get('/win-cdr', [WinCdrController::class, 'index'])->name('win-cdr');
    Route::get('/release-cdr', [ReleaseCdrController::class, 'index'])->name('release-cdr');
    Route::resource('/cdrs', CdrController::class);

//    Route::get('/',[HomeController::class, 'index']);
    Route::resource('/projects', ProjectController::class);

    Route::get('/project/create', [DynamicProjectController::class, 'index'])->name('dynamic-project.create');
    Route::post('/project/create', [DynamicProjectController::class, 'customProjectCreate'])->name('dynamic-project.create');



    Route::resource('/journals', JournalController::class );
    Route::get('/project-wise-report',[DynamicJournalController::class, 'project_wise_report'])->name('project-wise-report');
    Route::get('/account-wise-report',[DynamicJournalController::class, 'account_wise_report'])->name('account-wise-report');
    Route::get('/journal/create', [DynamicJournalController::class, 'index'])->name('dynamic-journal.create');
    Route::post('/Journals/create', [JournalController::class, 'customJournalCreate'])->name('dynamic-journal.create');


});
