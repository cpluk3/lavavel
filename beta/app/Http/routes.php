<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Default
Route::get('/', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('aboutus', 'PageController@aboutus');
Route::get('contactus', 'PageController@contactus');
Route::get('home', 'PageController@home');
Route::get('product', 'ProductController@index');
Route::post('enquiry', 'EnquiryController@index');

/* Admin tools */
Route::get('admin/main/dashboard', 'AdminController@dashboard');

/* Dropdown Menu */
Route::get('admin/dropdown/main', 'DropdownController@getMainCategories');
Route::get('admin/dropdown/sub/{main}', 'DropdownController@getSubCategories');
Route::get('admin/dropdown/items/{sub}', 'DropdownController@getItemList');

/* View */
Route::get('admin/{section}/view', 'ListViewController@viewListingPage');
/* Add */
Route::get('admin/{section}/add', 'AddViewController@add');

/* Create */
Route::post('admin/product/create', 'ProductController@create');
Route::post('admin/mainCategory/create', 'CategoryController@createMainCategory');
Route::post('admin/subCategory/create', 'CategoryController@createSubCategory');
Route::post('admin/feature/create', 'FeatureController@create');

/* Delete */
Route::get('admin/product/delete/{id}', 'ProductController@delete');
Route::get('admin/mainCategory/delete/{id}', 'CategoryController@deleteMainCategory');
Route::get('admin/subCategory/delete/{id}', 'CategoryController@deleteSubCategory');
Route::get('admin/enquiry/delete/{id}', 'EnquiryController@delete');
Route::get('admin/feature/delete/{id}', 'FeatureController@delete');

/* Edit */
Route::get('admin/product/edit', 'ProductController@edit');
Route::resource('admin/product/update', 'ProductController@update', ['names' => ['update' => 'product.update']]);

Route::get('admin/mainCategory/edit', 'CategoryController@editMainCategory');
Route::get('admin/subCategory/edit', 'CategoryController@editSubCategory');
Route::resource('admin/mainCategory/update', 'CategoryController@updateMainCategory', ['names' => ['update' => 'maincategory.update']]);
Route::resource('admin/subCategory/update', 'CategoryController@updateSubCategory', ['names' => ['update' => 'subcategory.update']]);

Route::get('admin/feature/edit', 'FeatureController@edit');
Route::resource('admin/feature/update', 'FeatureController@update', ['names' => ['update' => 'feature.update']]);

/* Setting */
Route::get('admin/setting/edit', 'SettingController@edit');
Route::resource('admin/setting/update', 'SettingController@update', ['names' => ['update' => 'setting.update']]);

/* Upload Image */
Route::get('admin/image/edit', 'ImageController@edit');
Route::post('admin/image/update', 'ImageController@update');
