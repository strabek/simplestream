<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/channels', 'App\Http\Controllers\ChannelController@list');
Route::get('/channels/{channel}/{date}/timezone/{timezone}', 'App\Http\Controllers\ChannelController@channelTimetable');
Route::get('/channels/{channel}/programmes/{programme-uuid}', 'App\Http\Controllers\ChannelController@programmeTimetable');
