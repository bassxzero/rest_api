<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//TODO If I have time I will probably create namespaces for the controllers based on the version number
//TODO need to add rollbacks for controlller that fail part way
//TODO need correct HTTP codes on responses
//TODO soft deletes or hard deletes? I'm not 100% what this calls for yet


// Group for version 1 of API
Route::prefix('v1')->group(function () {
    // Should probaly create a group for each endpoint

    // List 
    Route::get('products', 'Product@index' );

    // Show
    Route::get('products/{id}', 'Product@show' )->where('id', '[0-9]+');

    // Delete
    Route::delete('products/{id}', 'Product@destroy' )->where('id', '[0-9]+');

    // Create
    Route::post('products', 'Product@store' );

    // Update
    Route::put('products/{id}', 'Product@update' )->where('id', '[0-9]+');

});

// Placeholder for version 2 of API
Route::prefix('v2')->group(function () {
    //TODO write version 2?
});