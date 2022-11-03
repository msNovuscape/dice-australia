<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\ServiceController as FrontendServiceController;
use App\Http\Controllers\Admin\ReferralController as ReferralAdminController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\AccomodationController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as HomeAdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\AcademyCourseController;
use App\Http\Controllers\Admin\NewsAndUpdateController;
use App\Http\Controllers\Admin\SubOfficeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\NdisPricingController;
use App\Http\Controllers\Admin\ServiceFaqController;
use App\Http\Controllers\Admin\AddSectionController;
use App\Http\Controllers\Admin\SeoTitleController;
use App\Http\Controllers\Admin\TeamController;

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

Route::get('/', [HomeController::class,'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/referral', [ReferralController::class, 'create']);

Route::post('/referral', [ReferralController::class, 'store']);

Route::get('/gallery', [HomeController::class, 'gallery']);

Route::get('/service/{slug}', [FrontendServiceController::class,'single_service']);

Route::get('/ndis', function(){
    return view('ndis');
});
Route::get('login', [HomeAdminController::class,'getLogin'])->name('login');
Route::post('login', [HomeAdminController::class,'postLogin']);
Route::group(['middleware'=>['auth']],function (){
    //routes for admin
    Route::group(['prefix'=>'admin'],function (){

        Route::get('logout', [HomeAdminController::class,'getLogout']);
        Route::get('/index', [HomeAdminController::class,'indexAdmin']);

        Route::get('/change_password', [HomeAdminController::class,'change_password']);
        Route::post('/change_password', [HomeAdminController::class,'update_password']);

        Route::get('settings',[SettingController::class,'index']);
        Route::get('settings/create',[SettingController::class,'create']);
        Route::post('settings',[SettingController::class,'store']);
        Route::get('settings/{id}',[SettingController::class,'show']);
        Route::get('settings/{id}/edit',[SettingController::class,'edit']);
        Route::post('settings/{id}',[SettingController::class,'update']);
        Route::get('settings/{id}/delete',[SettingController::class,'delete']);


        // Route::get('service',[ServiceController::class,'index']);
        // Route::get('service/create',[ServiceController::class,'create']);
        // Route::post('service/store',[ServiceController::class,'store']);
        // Route::get('service/{id}/edit',[ServiceController::class,'edit']);
        // Route::post('service/{id}/update',[ServiceController::class,'update']);
        // Route::get('service/{id}/delete',[ServiceController::class,'delete']);

        Route::get('sliders',[SliderController::class,'index']);
        Route::get('sliders/create',[SliderController::class,'create']);
        Route::post('sliders',[SliderController::class,'store']);
        Route::get('sliders/{id}/view',[SliderController::class,'show']);
        Route::get('sliders/{id}/edit',[SliderController::class,'edit']);
        Route::post('sliders/{id}',[SliderController::class,'update']);
        Route::get('sliders/{id}/delete',[SliderController::class,'destroy']);


        Route::resource('about_us',AboutUsController::class);

        Route::get('subscriptions',[SubscriptionController::class,'index']);
        Route::get('subscriptions/create',[SubscriptionController::class,'create']);
        Route::post('subscriptions',[SubscriptionController::class,'store']);
        Route::get('subscriptions/{id}/view',[SubscriptionController::class,'show']);
        Route::get('subscriptions/{id}/edit',[SubscriptionController::class,'edit']);
        Route::post('subscriptions/{id}',[SubscriptionController::class,'update']);
        Route::get('subscriptions/{id}/delete',[SubscriptionController::class,'destroy']);


        Route::get('blogs',[NewsAndUpdateController::class,'index']);
        Route::get('blogs/create',[NewsAndUpdateController::class,'create']);
        Route::post('blogs',[NewsAndUpdateController::class,'store']);
        Route::get('blogs/{id}',[NewsAndUpdateController::class,'show']);
        Route::get('blogs/{id}/edit',[NewsAndUpdateController::class,'edit']);
        Route::post('blogs/{id}',[NewsAndUpdateController::class,'update']);
        Route::get('blogs/delete/{id}',[NewsAndUpdateController::class,'delete']);
        // Route::get('blog_point/{blog_point_id}',[BlogController::class,'blog_point']);

        Route::get('galleries',[GalleryController::class,'index']);
        Route::get('galleries/create',[GalleryController::class,'create']);
        Route::post('galleries',[GalleryController::class,'store']);
        Route::get('galleries/{id}',[GalleryController::class,'show']);
        Route::get('galleries/{id}/edit',[GalleryController::class,'edit']);
        Route::post('galleries/{id}',[GalleryController::class,'update']);
        Route::get('galleries/delete/{id}',[GalleryController::class,'delete']);


        

        Route::get('referrals',[ReferralAdminController::class,'index']);
        Route::get('referrals/create',[ReferralAdminController::class,'create']);
        Route::post('referrals/store',[ReferralAdminController::class,'store']);
        Route::get('referrals/{id}/view',[ReferralAdminController::class,'show']);
        Route::post('referrals/{id}/update',[ReferralAdminController::class,'update']);
        Route::get('referrals/{id}/delete',[ReferralAdminController::class,'delete']);

        Route::get('ndis_pricing',[NdisPricingController::class,'index']);
        Route::get('ndis_pricing/create',[NdisPricingController::class,'create']);
        Route::post('ndis_pricing',[NdisPricingController::class,'store']);
        Route::get('ndis_pricing/{id}/view',[NdisPricingController::class,'show']);
        Route::get('ndis_pricing/{id}/edit',[NdisPricingController::class,'edit']);
        Route::post('ndis_pricing/{id}',[NdisPricingController::class,'update']);
        Route::get('ndis_pricing/{id}/delete',[NdisPricingController::class,'destroy']);

        Route::get('sub_offices',[SubOfficeController::class,'index']);
        Route::get('sub_offices/create',[SubOfficeController::class,'create']);
        Route::post('sub_offices',[SubOfficeController::class,'store']);
        Route::get('sub_offices/{id}/edit',[SubOfficeController::class,'edit']);
        Route::post('sub_offices/{id}',[SubOfficeController::class,'update']);
        Route::get('sub_offices_delete/{id}',[SubOfficeController::class,'delete']);

        Route::get('departments',[DepartmentController::class,'index']);
        Route::get('departments/create',[DepartmentController::class,'create']);
        Route::post('departments/store',[DepartmentController::class,'store']);
        Route::get('departments/{id}/edit',[DepartmentController::class,'edit']);
        Route::post('departments/{id}',[DepartmentController::class,'update']);
        Route::get('departments/{id}/delete',[DepartmentController::class,'delete']);


        Route::get('services',[ServiceController::class,'index']);
        Route::get('services/create',[ServiceController::class,'create']);
        Route::post('service',[ServiceController::class,'store']);
        Route::get('services/{id}/edit',[ServiceController::class,'edit']);
        Route::get('services/{id}/view',[ServiceController::class,'show']);
        Route::post('services/{id}',[ServiceController::class,'update']);
        Route::get('services/{id}/delete',[ServiceController::class,'delete']);
        Route::get('service_point/{service_point_id}',[ServiceController::class,'service_point']);

        Route::get('services/{id}/sections',[ServiceSectionController::class,'index']);
        Route::get('services/{id}/section/create',[ServiceSectionController::class,'create']);
        Route::post('service/{id}/section',[ServiceSectionController::class,'store']);
        Route::get('services/{id}/section/{secId}/edit',[ServiceSectionController::class,'edit']);
        Route::get('services/{id}/section/{secId}/view',[ServiceSectionController::class,'show']);
        Route::post('services/{id}/section/{secId}',[ServiceSectionController::class,'update']);
        Route::get('services/{id}/section/delete',[ServiceSectionController::class,'delete']);
        // Route::get('service_point/{service_point_id}',[ServiceSectionController::class,'service_point']);

        Route::get('testimonials',[TestimonialController::class,'index']);
        Route::get('testimonials/create',[TestimonialController::class,'create']);
        Route::post('testimonials',[TestimonialController::class,'store']);
        Route::get('testimonials/{id}/edit',[TestimonialController::class,'edit']);
        Route::post('testimonials/{id}',[TestimonialController::class,'update']);
        Route::get('testimonials/{id}',[TestimonialController::class,'show']);

        Route::get('clients',[ClientController::class,'index']);
        Route::get('clients/create',[ClientController::class,'create']);
        Route::post('clients',[ClientController::class,'store']);
        Route::get('clients/{id}/edit',[ClientController::class,'edit']);
        Route::post('clients/{id}',[ClientController::class,'update']);


   


        Route::get('service_faqs',[ServiceFaqController::class,'index']);
        Route::get('service_faqs/create',[ServiceFaqController::class,'create']);
        Route::post('service_faqs',[ServiceFaqController::class,'store']);
        Route::get('service_faqs/{id}/edit',[ServiceFaqController::class,'edit']);
        Route::post('service_faqs/{id}',[ServiceFaqController::class,'update']);

        Route::get('add-sections',[AddSectionController::class,'index']);
        Route::get('add-sections/create',[AddSectionController::class,'create']);
        Route::post('add-sections',[AddSectionController::class,'store']);
        Route::get('add-sections/{id}/edit',[AddSectionController::class,'edit']);
        Route::post('add-sections/{id}',[AddSectionController::class,'update']);
        Route::get('add-sections/{id}/delete',[AddSectionController::class,'delete']);

        Route::get('seo_titles',[SeoTitleController::class,'index']);
        Route::get('seo_titles/create',[SeoTitleController::class,'create']);
        Route::post('seo_titles',[SeoTitleController::class,'store']);
        Route::get('seo_titles/{id}/edit',[SeoTitleController::class,'edit']);
        Route::post('seo_titles/{id}',[SeoTitleController::class,'update']);
        Route::get('seo_titles_delete/{id}',[SeoTitleController::class,'delete']);

        Route::get('contacts',[ContactUsController::class,'index']);
        Route::get('contacts/{id}/view',[ContactUsController::class,'show']);

        Route::get('enrollments',[EnrollmentController::class,'index']);
        Route::get('enrollments/{id}/view',[EnrollmentController::class,'show']);

        Route::get('teams',[TeamController::class,'index']);
        Route::get('teams/create',[TeamController::class,'create']);
        Route::post('teams',[TeamController::class,'store']);
        Route::get('teams/{id}/edit',[TeamController::class,'edit']);
        Route::post('teams/{id}',[TeamController::class,'update']);

        
        Route::get('careers',[CareerController::class,'index']);
        Route::get('careers/create',[CareerController::class,'create']);
        Route::post('careers',[CareerController::class,'store']);
        Route::get('careers/{id}/edit',[CareerController::class,'edit']);
        Route::post('careers/{id}',[CareerController::class,'update']);
        Route::get('careers/{id}',[CareerController::class,'show']);

        Route::get('accomodations',[AccomodationController::class,'index']);
        Route::get('accomodations/create',[AccomodationController::class,'create']);
        Route::post('accomodations',[AccomodationController::class,'store']);
        Route::get('accomodations/{id}/edit',[AccomodationController::class,'edit']);
        Route::post('accomodations/{id}',[AccomodationController::class,'update']);
        Route::get('accomodations/{id}',[AccomodationController::class,'show']);
        Route::get('accomodations/{id}/delete',[AccomodationController::class,'delete']);
        Route::get('accomodations/points_remove/{id}',[AccomodationController::class,'points_remove']);
        Route::get('accomodations/information_points_remove/{id}',[AccomodationController::class,'information_points_remove']);
        Route::get('accomodations/slider_points_remove/{id}',[AccomodationController::class,'slider_points_remove']);



    });

});