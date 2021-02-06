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

        // Setting Route
        Route::get('/settings/social_login','SettingController@Social_Login')->name('settings.social_login');
        Route::get('/settings/social_link','SettingController@Social_Links')->name('settings.social_links');
        Route::post('/social_links','SettingController@store')->name('settings.store');


});
