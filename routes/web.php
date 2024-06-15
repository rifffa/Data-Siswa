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
Route::group(['middleware' => ['guest']], function () {
    
//menampilkan form login
Route::get("/", "PageController@login")->name('login');

//cek login
Route::post("/ceklogin", "AuthController@ceklogin");

Route::get("/searchdatasiswa", "PageController@searchdatasiswa");
    
Route::get("/actsearchdatasiswa", "PageController@actsearchdatasiswa");
});


Route::group(['middleware' => ['auth']], function () {

Route::get("/register", "AuthController@register");

Route::post("/simpanuser", "AuthController@register");

Route::get("/home", "PageController@home");

Route::get("/datasiswa", "PageController@datasiswa");

//untuk menampilkan form untuk tambah data data siswa
Route::get("/datasiswa/add", "PageController@adddatasiswa");

//menyimpan data dari form movies ke database
Route::post("/save", "PageController@savedatasiswa");

//menangkap data dari database berdasarkan ID
Route::get('/datasiswa/edit/{id}', "PageController@edit");

//mengubah data dari form edit movies ke database
Route::put("/update/{id}", "PageController@update");

//aksi untuk menghapus data sesuai ID
Route::get("/delete/{id}", "PageController@delete");

//cek logout
Route::get("/logout", "AuthController@ceklogout");

Route::get("/edituser", "PageController@edituser");

Route::post("/updateuser", "PageController@updateuser");
});