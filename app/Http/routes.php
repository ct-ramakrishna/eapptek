<?php 
Route::group(['middleware' => 'web'], function () {
    Route::get('fileUpload', function () {

return view('fileUpload');

});

Route::post('fileUpload', ['as'=>'fileUpload','uses'=>'DashboardController@fileUpload']);
});