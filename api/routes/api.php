<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/video', 'Api\VideoController@index');

Route::prefix('libraries')->group(function () {
    Route::get('/', 'Api\LibraryController@index');
    Route::post('/store', 'Api\LibraryController@store');
    Route::get('/{Library}', 'Api\LibraryController@show');
    Route::patch('/{Library}/update', 'Api\LibraryController@update');
    Route::delete('/{Library}/destroy', 'Api\LibraryController@destroy');
    Route::post('/{Library}/add-folders', 'Api\LibraryController@addFolders');
});
