<?php

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => 'locale'], function() {

    Route::group(['middleware' => 'web', 'namespace' => 'Auth'], function(){
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'web'], function(){
        Route::get('/', 'CMSController@index')->name('cms::dashboard');
        Route::group(['prefix' => 'users', 'namespace' => 'Users'], function(){
            Route::get('u/{type}', 'UsersController@index')->name('cms::users');
            Route::get('users_data', 'UsersController@data')->name('cms::users::data');
            Route::get('create/{type}', 'UsersController@create')->name('cms::users::create');
            Route::post('store/{type}', 'UsersController@store')->name('cms::users::store');
            Route::get('edit/{id}/{type}', 'UsersController@show')->name('cms::users::edit');
            Route::post('e/store', 'UsersController@update')->name('cms::users::e-store');
            Route::post('soft_delete/{id}', 'UsersController@softDelete')->name('cms::users::soft_delete');
            Route::post('delete/{id}', 'UsersController@delete')->name('cms::users::delete');
            Route::post('restore/{id}', 'UsersController@restore')->name('cms::users::restore');
        });

        Route::group(['prefix' => 'agencies', 'namespace' => 'Agencies'], function(){
            Route::get('a/{agencies_type}', 'AgenciesController@index')->name('cms::agencies');
            Route::get('agencies_data', 'AgenciesController@data')->name('cms::agencies::data');
            Route::get('create/{agencies_type}', 'AgenciesController@create')->name('cms::agencies::create');
            Route::post('store/{agencies_type}', 'AgenciesController@store')->name('cms::agencies::store');
            Route::get('edit/{id}/{agencies_type}', 'AgenciesController@show')->name('cms::agencies::edit');
            Route::post('e/store', 'AgenciesController@update')->name('cms::agencies::e-store');
            Route::post('soft_delete/{id}', 'AgenciesController@softDelete')->name('cms::agencies::soft_delete');
            Route::post('delete/{id}', 'AgenciesController@delete')->name('cms::agencies::delete');
            Route::post('restore/{id}', 'AgenciesController@restore')->name('cms::agencies::restore');
        });

        Route::group(['prefix' => 'categories', 'namespace' => 'Categories'], function(){
            Route::get('', 'CategoriesController@index')->name('cms::categories');
            Route::get('generateCode', 'CategoriesController@generateCode')->name('cms::categories::generateCode');
            Route::get('categories_data', 'CategoriesController@data')->name('cms::categories::data');
            Route::get('create', 'CategoriesController@create')->name('cms::categories::create');
            Route::post('store', 'CategoriesController@store')->name('cms::categories::store');
            Route::get('edit/{id}', 'CategoriesController@show')->name('cms::categories::edit');
            Route::post('e/store', 'CategoriesController@update')->name('cms::categories::e-store');
            Route::post('soft_delete/{id}', 'CategoriesController@softDelete')->name('cms::categories::soft_delete');
            Route::post('delete/{id}', 'CategoriesController@delete')->name('cms::categories::delete');
            Route::post('restore/{id}', 'CategoriesController@restore')->name('cms::categories::restore');
        });

        Route::group(['prefix' => 'units', 'namespace' => 'Units'], function(){
            Route::get('', 'UnitsController@index')->name('cms::units');
            Route::get('generateCode', 'UnitsController@generateCode')->name('cms::units::generateCode');
            Route::get('getCategory', 'UnitsController@getCategory')->name('cms::units::getCategory');
            Route::get('units_data', 'UnitsController@data')->name('cms::units::data');
            Route::get('create', 'UnitsController@create')->name('cms::units::create');
            Route::post('store', 'UnitsController@store')->name('cms::units::store');
            Route::get('edit/{id}', 'UnitsController@show')->name('cms::units::edit');
            Route::post('e/store', 'UnitsController@update')->name('cms::units::e-store');
            Route::post('soft_delete/{id}', 'UnitsController@softDelete')->name('cms::units::soft_delete');
            Route::post('delete/{id}', 'UnitsController@delete')->name('cms::units::delete');
            Route::post('restore/{id}', 'UnitsController@restore')->name('cms::units::restore');
        });
    });

});
