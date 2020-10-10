<?php

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

Route::get('/channels', 'ChannelController@list');
Route::get('/channels/{channel-uuid}/{date}/timezone/{timezone}', 'ChannelController@channelTimetable');
Route::get('/channels/{channel-uuid}/programmes/{programme-uuid}', 'ChannelController@programmeTimetable');
