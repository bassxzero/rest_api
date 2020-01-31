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
//TODO need to add rollbacks to controlller that fail part way
//TODO need correct HTTP codes on responses
//TODO soft deletes or hard deletes? I'm not 100% what this calls for yet
//TODO add option to return data in a specific format xml, json, form data, etc
//TODO I'm not sure if I like my tables relationships right now. Change them???




// Group for version 1 of API
Route::middleware('auth:api')->prefix('v1')->group(function () {
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

Route::post('register', 'ApiAuthController@register' );
    
//Route::post('login', 'ApiAuthController@login');

Route::post('login', [ 'as' => 'login', 'uses' => 'ApiAuthController@login']);

// Placeholder for version 2 of API
Route::prefix('v2')->group(function () {
    //TODO write version 2?
});