<?php

use Illuminate\Support\Facades\{Log, Route};

/*
|--------------------------------------------------------------------------
| Developer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Log::channel('activity')->notice('The developer web path is initiated.');

$baseFolder = 'Developer';

Route::get('/', function () {
    return view('welcome');
});

Route::any('/login', [
    'uses' => "{$baseFolder}\DeveloperController@login",
    'as'   => 'developer.login'
]);

Route::any('/logs', [
    'uses' => "{$baseFolder}\LogController@login",
    'as'   => 'developer.logs'
]);