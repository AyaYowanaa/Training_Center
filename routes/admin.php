<?php

use App\Http\Controllers\Admin\hr\EmployeeController;
use App\Http\Controllers\Admin\hr\HolidaysController;
use App\Http\Controllers\Admin\hr\MainHrController;
use App\Http\Controllers\Admin\hr\Setting\HolidaysettingController;
use App\Http\Controllers\Admin\hr\Setting\MainsettingController;
use App\Http\Controllers\Admin\hr\Setting\TypeSettingController;
use App\Http\Controllers\Admin\settings\CityController;
use App\Http\Controllers\Admin\settings\DistrictController;
use App\Http\Controllers\Admin\Site\BlogController;
use App\Http\Controllers\Admin\Site\ContactController;
use App\Http\Controllers\Admin\Site\EventController;
use App\Http\Controllers\Admin\Site\ProjectController;
use App\Http\Controllers\Admin\Site\GalleryController;
use App\Http\Controllers\Admin\Site\MaindataController;
use App\Http\Controllers\Admin\Site\StaffController;
use App\Http\Controllers\Admin\Site\VideosController;
use App\Http\Controllers\Admin\Site\SiteFeedbackController;
use App\Http\Controllers\Admin\Site\SitePartenersController;
use App\Http\Controllers\Admin\Site\SiteStatisticsController;
use App\Http\Controllers\Admin\Site\SiteAdvantageController;
use App\Http\Controllers\Admin\Site\SitePolicesController;
use App\Http\Controllers\Admin\Site\BannerController;
use App\Http\Controllers\Admin\Surveys\FinanceServiceController;
use App\Http\Controllers\Admin\Surveys\TrainingCentersController;
use App\Http\Controllers\Admin\Surveys\SupportingEntityController;
use App\Http\Controllers\Admin\Users\PermissionsController;
use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\RolesController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\subscriptions\Exercises_C;
use App\Http\Controllers\Admin\subscriptions\MainSubscription_C;
use App\Http\Controllers\Admin\subscriptions\Transportation_C;
use App\Http\Controllers\Admin\subscriptions\Offers_C;

// use App\Http\Controllers\Admin\Users\UsersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Define routes for the "languages" prefix outside the group
Route::prefix('languages')->group(function () {
    // Your routes for the "languages" prefix
});
Route::get('/pre_home', function () {
    return view('welcome');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:admin']
    ], function () {


    Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', function () {
            return view('dashbord.home');
        })->name('dashboard');

        Route::get('/test', function () {
            return ' test admin ';
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        /************************** MAINDATA *****************************/
        Route::resource('mdata', MaindataController::class);
        /************************** About *****************************/
        Route::resource('about', \App\Http\Controllers\Admin\Site\AboutController::class);
        Route::get('about/show_load/{id}', [\App\Http\Controllers\Admin\Site\AboutController::class, 'show_load'])->name('about.load_details');
        /************************** Staff *****************************/
        Route::resource('staff', StaffController::class);

        Route::get('staff/show_load/{id}', [StaffController::class, 'show_load'])->name('staff.load_details');
        /************************** Contact Us *****************************/
        Route::resource('contact', ContactController::class);
        Route::get('contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');

        /************************** Blog *****************************/
        Route::resource('blog', BlogController::class);
        Route::get('blog/destroy_image/{id}', [BlogController::class, 'destroy_image'])->name('blog.destroy_image');
        Route::get('blog/show_load/{id}', [BlogController::class, 'show_load'])->name('blog.load_details');

        /************************** Events *****************************/
        Route::resource('event', EventController::class);
        Route::get('event/destroy_image/{id}', [EventController::class, 'destroy_image'])->name('event.destroy_image');

        /************************* Projects ***********************/
        Route::resource('projects', ProjectController::class);
        Route::get('projects/destroy_image/{id}', [ProjectController::class, 'destroy_image'])->name('project.destroy_image');
        Route::get('projects/show_load/{id}', [ProjectController::class, 'show_load'])->name('projects.load_details');

        /************************** Gallery *****************************/
        Route::resource('gallery', GalleryController::class);
        Route::get('gallery/destroy_image/{id}', [GalleryController::class, 'destroy_image'])->name('gallery.destroy_image');
        Route::get('gallery/show_load/{id}', [GalleryController::class, 'show_load'])->name('gallery.load_details');
        /************************** video *****************************/
        Route::resource('videos', VideosController::class);
        Route::get('videos/show_load/{id}', [VideosController::class, 'show_load'])->name('videos.load_details');
        /*************************** Feedback ********************************* */
        Route::resource('feedback', SiteFeedbackController::class);
        //  Route::get('feedback/destroy/{id}', [SiteFeedbackController::class, 'destroy'])->name('feedback.destroy');
        Route::get('feedback/show_load/{id}', [SiteFeedbackController::class, 'show_load'])->name('feedback.load_details');
        /*************************** Partner ********************************* */
        Route::resource('partner', SitePartenersController::class);
        Route::get('partner/show_load/{id}', [SitePartenersController::class, 'show_load'])->name('partner.load_details');
        /*************************** Statistics ********************************* */
        Route::resource('statistics', SiteStatisticsController::class);

        /*************************** Advantages ********************************* */
        Route::resource('advantages', SiteAdvantageController::class);
        Route::get('advantages/show_load/{id}', [SiteAdvantageController::class, 'show_load'])->name('advantages.load_details');

        
        /*************************** polices ********************************* */
        Route::resource('polices', SitePolicesController::class);
        Route::get('polices/show_load/{id}', [SitePolicesController::class, 'show_load'])->name('polices.load_details');

         /*************************** Banner ********************************* */
         Route::resource('banner', BannerController::class);
         Route::get('banner/show_load/{id}', [BannerController::class, 'show_load'])->name('banner.load_details');

        /*-----------------------------setting --------------------------*/

        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
            Route::resource('district', DistrictController::class);
            Route::get('district/delete/{id}', [DistrictController::class, 'delete'])->name('district.delete');

            Route::resource('city', CityController::class);
            Route::get('city/delete/{id}', [CityController::class, 'delete'])->name('city.delete');
            Route::post('getDistricts', [MainController::class, 'getDistricts'])->name('getDistricts');


        });
        /*-----------------------------setting --------------------------*/

        Route::group(['prefix' => 'UserManagement', 'as' => 'UserManagement.'], function () {

            Route::resource('users', UsersController::class);

            /*Route::get('/add_user', [UsersController::class, 'index'])->name('add_users_form');
            Route::post('/add_user', [UsersController::class, 'store'])->name('add_users');
            Route::get('/all_users', [UsersController::class, 'get_all_users'])->name('all_users');
            Route::get('/all_users/{id}', [UsersController::class, 'edit'])->name('user.edit');
            Route::patch('/all_users/{id}', [UsersController::class, 'update'])->name('user_update');
            Route::delete('/all_users/{id}', [UsersController::class, 'destroy'])->name('user_destroy');*/
            Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');


            /************************** permission *****************************/
            Route::resource('permission', PermissionsController::class);
            Route::get('permission/delete/{id}', [PermissionsController::class, 'delete'])->name('permission.delete');
            /************************** rolls *****************************/
            Route::resource('roles', RolesController::class);
            Route::get('roles/load_edit', [RolesController::class, 'load_edit'])->name('roles.load_edit');

            Route::get('roles/permission/{id}', [RolesController::class, 'get_permission'])->name('roles.permission');
            Route::get('roles/delete/{id}', [RolesController::class, 'delete'])->name('roles.delete');

        });

        Route::resource('TrainingCenters', TrainingCentersController::class);
        Route::get('TrainingCenters/show_load/{id}', [TrainingCentersController::class, 'show_load'])->name('TrainingCenters.load_details');
        Route::get('TrainingCenters/edit_en/{id}', [TrainingCentersController::class, 'edit_en'])->name('TrainingCenters.edit_en');
        Route::patch('TrainingCenters/update_en/{id}', [TrainingCentersController::class, 'update_en'])->name('TrainingCenters.update_en');

        /*--------------------------------finance_dervice------------------------------*/

        Route::resource('service', FinanceServiceController::class);
        Route::get('service/show_load/{id}', [FinanceServiceController::class, 'show_load'])->name('service.load_details');
        Route::get('service/edit_en/{id}', [FinanceServiceController::class, 'edit_en'])->name('service.edit_en');
        Route::patch('service/update_en/{id}', [FinanceServiceController::class, 'update_en'])->name('service.update_en');

        /*--------------------------------supporting entity------------------------------*/

        Route::resource('entity', SupportingEntityController::class);
        Route::get('entity/show_load/{id}', [SupportingEntityController::class, 'show_load'])->name('entity.load_details');
        Route::get('entity/edit_en/{id}', [SupportingEntityController::class, 'edit_en'])->name('entity.edit_en');
        Route::patch('entity/update_en/{id}', [SupportingEntityController::class, 'update_en'])->name('entity.update_en');


    });


});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    require __DIR__ . '/adminauth.php';
});
