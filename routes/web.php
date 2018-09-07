<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

/*Route::get('mahasiswa','MahasiswaController@index');
Route::get('mahasiswa/{id}','MahasiswaController@show');
Route::post('mahasiswa','MahasiswaController@store');
Route::put('mahasiswa/{id}','MahasiswaController@update');
Route::delete('mahasiswa/{id}','MahasiswaController@destroy');*/


/*Route::resource('mahasiswa','MahasiswaController');*/
/*Route::resource('buku','BukuController');*/
Route::get('buku/search/', 'BukuController@index');
Route::get('buku/search/{pengarang}', 'BukuController@search');