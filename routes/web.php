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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','UserController@index');
Route::get('/login','LoginController@login')->name('login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/generate/password', function(){ return bcrypt(123456789); });

// single page authentication.
//Route::get('/photogallery','PhotoGalleryController@index')->name('photogallery')->middleware('auth');


// CARRY AUTHENTICATION OF ALL PAGES WITH ONE FUNCTION.
Route::middleware('auth')->group(function(){

	Route::get('/photogallery','PhotoGalleryController@index')->name('photogallery');
	Route::get('/upload','UploadController@index')->name('upload');
	Route::post('/store','CSVController@store')->name('store');
	Route::get('/download','DownloadController@index')->name('download');
	Route::get('/formsubmit','FormController@index')->name('formsubmit');
	Route::post('/storeformvalues','FormController@store');
	Route::get('/singleinvites','FormController@store');
	Route::get('/advanceform','FormController@advanceform');
	Route::get('/csvupload','CSVController@index');
	Route::get('/multipleform','MultipleFormController@index')->name('multipleform');
	Route::post('/multipleform','MultipleFormController@submit');
	Route::get('/fetchgooglereviews','ReviewController@index')->name('fetchgooglereviews');
	Route::get('googlereviews','ReviewController@show');
	Route::get('fetchmyreviews','ReviewController@getplaceid')->name('fetchmyreviews');
	Route::post('/reviewstable','ReviewController@index');
	Route::get('fetchmyreviews','ReviewController@getplaceid')->name('fetchmyreviews');
	Route::get('transfergoods','TransferController@start')->name('transfergoods');
	Route::get('testing','LoginController@testing')->name('testpage');
	Route::get('sitemap', 'SiteMapController@index');
	Route::get('crum', 'CrumController@index');
	Route::get('generatesitemap','SiteMapController@generate');

});
