<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Students\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Students\ProfileController;



Route::get('/', function () {
    return view('students_dashboard.home');
})->name('home');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/test_student', function () {
            return 'test done';
        });
        Route::group(['middleware' => ['guest:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
            Route::get('/test_guest', function () {
                return 'test guest done';
            });
            Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

            Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->name('login.store');
        });
        Route::group(['middleware' => ['auth:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
            Route::get('/dashboard', function () {
                return view('students_dashboard.home');
            })->name('dashboard');

            Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
                
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

        });

    }
);
