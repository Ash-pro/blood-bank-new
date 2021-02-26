<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')
    ->name('dashboard.')
//    ->middleware(['auth'])
//    ->middleware(['auth','role:super_admin,admin'])
    ->group(function (){

    //dashboard.welcome  - welcome_Route
        Route::get('/','welcomeController@index')->name('welcome');

    //category Routes
        Route::resource('categories','CategoryController')->except(['show']);

    //sub Categories
        Route::resource('sub_categories','SubCategoryController')->except(['show']);

    //WhoAreWe
            Route::resource('WhoAreWes','whoAreWeController')->except(['show']);

    //contact_us
            Route::resource('contact_us','ContactUsController')->except(['show']);

    //Role Route
        Route::resource('roles','RoleController');

    //User Route
        Route::resource('users','UserController');

    //blood_donations Route
        Route::resource('blood_donations','BloodDonationController');
    //classification Route
        Route::resource('classifications','ClassificationRequestController');
    //trusted_request Route
        Route::resource('trusted_requests','TrustedRequestController');
    //team_works Route
        Route::resource('team_works','TeamWorkController');
    //team_works Route
        Route::resource('visitor_messages','VisitorMessagesController');

        // Setting Route
        Route::get('/settings/social_login','SettingController@Social_Login')->name('settings.social_login');
        Route::get('/settings/social_link','SettingController@Social_Links')->name('settings.social_links');
        Route::post('/social_links','SettingController@store')->name('settings.store');
        //about_sites
        Route::get('/settings/about_sites','SettingController@about_sites')->name('settings.about_sites');
        Route::post('/about_sites','SettingController@store_about_sites')->name('settings.store_about_sites');

    });
