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
Route::group(['middleware' => 'cors'], function () {
  Route::post('login', 'APILoginController@login');
  Route::get('query', 'DictionaryController@query');

});
Route::resource('asistencias', 'AsistenciaController');
Route::ApiResource ('asistenciass', 'Asistencia2Controller');

