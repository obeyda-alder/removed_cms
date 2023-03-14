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

Route::middleware('api')->get('/', function () {
    return response()->json([
        'message' => 'SORRY!',
        'status' => 'Internal server error!'
    ], 500);

});

Route::any('{url}', function(){
    return redirect('/api');
})->where('url', '.*');

// Route::middleware('auth:api')->get('/cms', function (Request $request) {
//     return $request->user();
// });
