<?php

use Illuminate\Support\Facades\Route;

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
    return view('template.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/grade', 'GradeController@index')->middleware('auth');
Route::get('/grade/tambah', 'GradeController@create')->middleware('auth');
Route::post('/grade/tambah/save', 'GradeController@store')->middleware('auth');
Route::get('/grade/edit/{id}', 'GradeController@edit')->middleware('auth');
Route::patch('/grade/edit/{id}/save', 'GradeController@update')->middleware('auth');
Route::delete('/grade/delete/{id}', 'GradeController@destroy')->middleware('auth');

Route::get('/user','UserController@index')->middleware('auth');
Route::get('/user/tambah', 'UserController@create')->middleware('auth');
Route::post('/user/tambah/save', 'UserController@store');
Route::get('user/edit/{id}', 'UserController@edit')->middleware('auth');
Route::patch('/user/edit/{id}/save', 'UserController@update')->middleware('auth');
Route::delete('/user/delete/{id}', 'UserController@destroy')->middleware('auth');

Route::get('/kinerja/absensi/{kinerja_id}','KinerjaPegawaiDetailController@create')->middleware('auth');
Route::patch('/kinerja/absensi/{kinerja_id}/save','KinerjaPegawaiDetailController@store')->middleware('auth');
Route::get('/kinerja/absensi/edit/{detail_id}','KinerjaPegawaiDetailController@edit')->middleware('auth');
Route::patch('/kinerja/absensi/edit/{detail_id}','KinerjaPegawaiDetailController@update')->middleware('auth');
Route::delete('/kinerja/delete/{kinerja_id}','KinerjaPegawaiController@destroy')->middleware('auth');
Route::get('/kinerja/status/{kinerja_id}','KinerjaPegawaiController@status')->middleware('auth');

Route::get('/absensi','KinerjaPegawaiDetailController@index')->middleware('auth');
Route::get('/absensi/edit/{detail_id}','KinerjaPegawaiDetailController@edit')->middleware('auth');
Route::patch('/absensi/edit/{detail_id}/save','KinerjaPegawaiDetailController@update')->middleware('auth');
Route::get('/absensi/tunjangan/{detail_id}','KinerjaPegawaiDetailController@tunjangan')->middleware('auth');
Route::delete('/absensi/delete/{detail_id}','KinerjaPegawaiDetailController@destroy')->middleware('auth');

Route::get('/kinerja','KinerjaPegawaiDetailController@index')->middleware('auth');
Route::get('kinerja/tambah','KinerjaPegawaiController@create')->middleware('auth');
Route::post('/kinerja/tambah/save','KinerjaPegawaiController@store')->middleware('auth');
Route::get('/kinerja/edit/{kinerja_id}','KinerjaPegawaiController@edit')->middleware('auth');
Route::patch('/kinerja/edit/{kinerja_id}/save','KinerjaPegawaiController@update')->middleware('auth');
Route::delete('/kinerja/delete/{id}','KinerjePegawaiController@destroy')->middleware('auth');
Route::get('/kinerja/detail/{kinerja_id}','KinerjaPegawaiDetailController@detail')->middleware('auth');

Route::get('/tunjangan_kinerja','TunjanganController@kinerja')->middleware('auth');
Route::get('/tunjangan/detail/{kinerja_id}','TunjanganController@index')->middleware('auth');
Route::get('/tunjangan/pegawai/{kinerja_id}','TunjanganController@pegawai')->middleware('auth');
Route::get('/tunjangan/cetak/{kinerja_id}','TunjanganController@cetak')->middleware('auth');
Route::get('/tunjangan_pegawai','TunjanganController@pegawai')->middleware('auth');
Route::get('/tunjangan_pegawai/detail/{detail_id}','TunjanganController@pegawai_detail')->middleware('auth');
Route::get('/tunjangan/export_excel/{kinerja_id}','TunjanganController@export_excel')->middleware('auth');

Route::get('/json-pangkat','KeterlambatanController@pangkat');
Route::get('/json-jk','KeterlambatanController@pegawai');

Route::get('/daftar','UserController@daftar');
Route::get('/profil/{id}','UserController@editProfil')->middleware('auth');

