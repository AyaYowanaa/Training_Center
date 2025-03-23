<?php


use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SurveysController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*Route::get('/', function () {
    return view('coming-soon');
})->name('home');*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('projects', [HomeController::class, 'projects'])->name('projects');
    Route::get('projects/{id}', [HomeController::class, 'one_project'])->name('one_project');
    Route::get('blogs', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('blogs/{id}', [HomeController::class, 'one_blog'])->name('one_blog');
    Route::post('blogsComment', [HomeController::class, 'blogsComment'])->name('blogsComment');
    Route::get('contact_us', [HomeController::class, 'contact_us'])->name('contact_us');
    Route::post('SaveContact_us', [HomeController::class, 'SaveContact_us'])->name('SaveContact_us');
    Route::get('StudentRegistration', [HomeController::class, 'StudentRegistration'])->name('StudentRegistration');
    Route::post('SaveStudentRegistration', [HomeController::class, 'SaveStudentRegistration'])->name('SaveStudentRegistration');
    Route::get('contact_us', [HomeController::class, 'contact_us'])->name('contact_us');
    Route::get('events', [HomeController::class, 'events'])->name('events');
    Route::get('events/{id}', [HomeController::class, 'one_events'])->name('one_events');
    Route::get('videos', [HomeController::class, 'video'])->name('videos');
    Route::get('photos', [HomeController::class, 'photos'])->name('photos');
    Route::get('photosDetails/{id}', [HomeController::class, 'photosDetails'])->name('photosDetails');
    Route::get('teachers', [HomeController::class, 'teacher'])->name('teachers');
    Route::get('about_us', [HomeController::class, 'about'])->name('about_us');

    /*------------------------****************************-----Surveys-------------************************-------------------------*/
    Route::get('TrainingCenters', [SurveysController::class, 'TrainingCenters'])->name('TrainingCenters');
    Route::get('TrainingCentersDetails/{id}', [SurveysController::class, 'TrainingCentersDetails'])->name('TrainingCentersDetails');
    Route::get('FinanceService', [SurveysController::class, 'FinanceService'])->name('FinanceService');

});
