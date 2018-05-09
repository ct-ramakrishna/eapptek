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

Route::group(['middleware' => ['auth']], function()
{
    Auth::routes();
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('contents','ContentController');
Route::resource('products','ProductsController');

// Route::resource('contents/{id}','ContentController@show');
// Route::resource('contents/create','ContentController@index');
// Route::get('/hello', function () {
//     // return view('welcome');
//     return '<h2>Hello laravel</h2>';
// });
// Route::get('/about', function () {
//     return view('pages.about');
// });
// Route::get('/users/{id}/{name}',function($id,$name){
//    return 'welcome '.$name.' with an id'.$name;
// });



Route::get('/dashboard', 'DashboardController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
