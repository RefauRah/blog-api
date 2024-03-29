<?php
use Illuminate\Support\Facades\Route;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/', function () use ($router) {
    return $router->app->version();
});

Route::group(['prefix' => 'post'], function() {
    Route::get('/', 'PostController@index');
    Route::post('/create', 'PostController@store');
    Route::get('/send-notification', 'PostController@sendNotification');
});



