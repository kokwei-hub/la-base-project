<?php

use Illuminate\Support\Facades\{Log, Route};

/*
|--------------------------------------------------------------------------
| Member Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Log::channel('activity')->notice('The member web path is initiated.');

$baseFolder = 'Member';

Route::get('/', function () {
    return view('welcome');
});
