<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/welcome');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Ingredient Category
    Route::delete('ingredient-categories/destroy', 'IngredientCategoryController@massDestroy')->name('ingredient-categories.massDestroy');
    Route::post('ingredient-categories/media', 'IngredientCategoryController@storeMedia')->name('ingredient-categories.storeMedia');
    Route::post('ingredient-categories/ckmedia', 'IngredientCategoryController@storeCKEditorImages')->name('ingredient-categories.storeCKEditorImages');
    Route::resource('ingredient-categories', 'IngredientCategoryController');

    // Ingredient
    Route::delete('ingredients/destroy', 'IngredientController@massDestroy')->name('ingredients.massDestroy');
    Route::post('ingredients/media', 'IngredientController@storeMedia')->name('ingredients.storeMedia');
    Route::post('ingredients/ckmedia', 'IngredientController@storeCKEditorImages')->name('ingredients.storeCKEditorImages');
    Route::resource('ingredients', 'IngredientController');

    // Advertisement
    Route::delete('advertisements/destroy', 'AdvertisementController@massDestroy')->name('advertisements.massDestroy');
    Route::post('advertisements/media', 'AdvertisementController@storeMedia')->name('advertisements.storeMedia');
    Route::post('advertisements/ckmedia', 'AdvertisementController@storeCKEditorImages')->name('advertisements.storeCKEditorImages');
    Route::resource('advertisements', 'AdvertisementController');

    // Outlet
    Route::delete('outlets/destroy', 'OutletController@massDestroy')->name('outlets.massDestroy');
    Route::post('outlets/media', 'OutletController@storeMedia')->name('outlets.storeMedia');
    Route::post('outlets/ckmedia', 'OutletController@storeCKEditorImages')->name('outlets.storeCKEditorImages');
    Route::resource('outlets', 'OutletController');

    // Section
    Route::resource('sections', 'SectionController')->only([
        'index'
    ]);
    Route::put('sections', 'SectionController@update')->name('sections.update');
    Route::post('sections/media', 'SectionController@storeMedia')->name('sections.storeMedia');

    // Journey
    Route::delete('journeys/destroy', 'JourneyController@massDestroy')->name('journeys.massDestroy');
    Route::post('journeys/media', 'JourneyController@storeMedia')->name('journeys.storeMedia');
    Route::post('journeys/ckmedia', 'JourneyController@storeCKEditorImages')->name('journeys.storeCKEditorImages');
    Route::resource('journeys', 'JourneyController')->only([
        'index',
        'destroy',
        'store'
    ]);

    // Our Services
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServiceController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServiceController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::resource('services', 'ServiceController');

    // Join Us Page
    Route::delete('join-us-pages/destroy', 'JoinUsPageController@massDestroy')->name('join-us-pages.massDestroy');
    Route::post('join-us-pages/media', 'JoinUsPageController@storeMedia')->name('join-us-pages.storeMedia');
    Route::post('join-us-pages/ckmedia', 'JoinUsPageController@storeCKEditorImages')->name('join-us-pages.storeCKEditorImages');
    Route::resource('join-us-pages', 'JoinUsPageController');

    // Setting
    Route::resource('settings', 'SettingController');
    Route::put('settings', 'SettingController@update')->name('settings.update');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('/welcome', 'LandingPageController')->name('landing-page');
Route::get('/byob', 'MenuController@index')->name('byob');
Route::get('/story', 'StoryController')->name('story');
Route::get('/menu', 'MenuController@menu')->name('menu');
Route::get('/service', 'ServiceController')->name('service');
Route::get('/join-us', 'JoinUsController')->name('join-us');
Route::get('/contact-us', 'ContactController')->name('contact-us');
