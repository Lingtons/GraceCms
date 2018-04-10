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


Route::group(['prefix' => 'v1'], function () {

Route::get('/post/{id?}', [function($id = null) {
$posts = App\Post::with('category', 'lessons')->orderBy('ddate', 'desc')->get();

return Response::json(array(
            
            'posts' => $posts->toArray(),
            
        ));
}]);

Route::get('/booster/{id?}', [function($id = null) {
$boosters = App\Booster::orderBy('created_at', 'desc')->get();

return Response::json(array(
            
            'boosters' => $boosters->toArray(),
            
        ));
}]);

Route::get('/events/{id?}', [function($id = null) {
$events = App\Post::where('category_id', 1)->with('category')->orderBy('created_at', 'desc')->get();

return Response::json(array(
            
            'events' => $events->toArray(),
            
        ));
}]);


});