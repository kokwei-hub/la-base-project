<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Log, Route};

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

Log::channel('activity')->notice('The api web path is initiated.');

$baseFolder = 'Api';

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
