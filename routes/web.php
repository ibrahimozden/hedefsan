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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::resource('setups', 'SetupController');
Route::resource('solutions', 'SolutionController');
Route::resource('errors', 'ErrorController');
Route::resource('installationtypes', 'InstallationTypeController');
Route::resource('pdffiles', 'PdfFileController');
Route::resource('products', 'ProductController');
Route::resource('productsetups', 'ProductSetupController');
Route::resource('productpdfs', 'ProductPdfController');


Route::get('/searchsetup', 'SetupController@searchsetup');
Route::get('/searchsolution', 'SolutionController@searchsolution');
Route::get('/searcherror', 'ErrorController@searcherror');
Route::get('/searchinstallationtype', 'InstallationTypeController@searchinstallationtype');
Route::get('/searchpdffile', 'PdfFileController@searchpdffile');
Route::get('/searchproduct', 'ProductController@searchproduct');
Route::get('/searchproductsetup', 'ProductSetupController@searchproductsetup');
Route::get('/searchproductpdf', 'ProductPdfController@searchproductpdf');










