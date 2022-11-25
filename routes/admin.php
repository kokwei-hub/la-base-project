<?php

use Illuminate\Support\Facades\{Log, Route};

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Log::channel('activity')->notice('The admin web path is initiated.');

$baseFolder = 'Admin';

Route::get('/', function () {
    return view('welcome', ['code' => '404', 'message' => 'Page not found.']);
});
