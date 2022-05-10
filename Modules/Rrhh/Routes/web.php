<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your rrhhlication. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::group(["middleware" => 'auth'], function () {
    Route::prefix('rrhh')->middleware('permission:subsistemarrhhpersonal.acceso')->group(function () {
      Route::get('/', 'RrhhController@index');
      Route::get('form_create', 'RrhhcontrolController@create')->name('rrhh.form_create')->middleware('permission:administracion.crearpersonal');
      Route::post('savepers', 'RrhhcontrolController@store')->name('rrhh.savepers');
      Route::get('form_edit/{id}', 'RrhhcontrolController@edit')->name('rrhh.form_edit')->middleware('permission:administracion.editpersonal');
      Route::put('putper/{id}', 'RrhhcontrolController@putper')->name('rrhh.putper');
      Route::get('personals', 'RrhhcontrolController@index')->name('rrhh.personals')->middleware('permission:administracion.personalrrhh');
      //personal
      Route::get('/personal', 'PersonalController@index')->name('rrhh.personal');
      Route::get('/getpersonal/{id}', 'PersonalController@getpersonal')->name('rrhh.getpersonal');
      Route::post('/personalsav', 'PersonalController@store')->name('rrhh.personalstore');
      Route::post('/uppersonal/{id}', 'PersonalController@update')->name('rrhh.personalupdate');
      //biometric
      Route::get('bioconect','BioController@index');
      Route::get('pdftoimge','BioController@pdf')->name('rrhh.pdf');
      Route::post('pdforimg','BioController@pdftoimage')->name('rrhh.pdfimag');
    });
  });


