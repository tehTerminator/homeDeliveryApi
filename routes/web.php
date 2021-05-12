<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UserController;
use App\Models\District;
use App\Models\State;

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('state[/{state_id:[0-9]+}]', function($state_id = NULL) { 
    if (is_null($state_id)) {
        return response()->json(State::all()); 
    }
    return response()->json(State::findOrFail($state_id));
});

$router->get('state/{state_id:[0-9]+}/districts', function($state_id) {
    $district = District::where('state_id', $state_id)->get();
    return response()->json($district);
});

$router->post('user', [UserController::class, 'select']);


$router->group(['prefix' => 'create'], function () use ($router) {
    $router->post('user', ['use' => 'UserController@create']);
    $router->post('state', ['use' => 'StateController@create']);
    $router->post('district', ['use' => 'DistrictController@create']);
});

$router->group(['prefix' => 'update'], function () use ($router) {
    $router->put('state', ['use' => 'StateController@update']);
    $router->put('district', ['use' => 'DistrictController@update']);
});

