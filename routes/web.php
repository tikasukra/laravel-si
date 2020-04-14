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

Route::get("/login", "LoginController@showLoginForm")->name("login");
Route::post("/login", "LoginController@login")->name("login.login");

Route::get("/logout", "LoginController@logout")->name("logout");

// Route::middleware("auth")->group(function (){

// list mahasiswa
Route::get("/biodata-mahasiswa", "BiodataController@index")->name("biodata.index");
// detail mahasiswa
Route::get("/biodata-mahasiswa/{id}/detail", "BiodataController@show")->name("biodata.show");
// create new data
Route::get("/biodata-mahasiswa/create", "BiodataController@create")->name("biodata.create");
// input data
Route::post("/biodata-mahasiswa", "BiodataController@store")->name("biodata.store");
// edit data
Route::get("/biodata-mahasiswa/{id}/edit", "BiodataController@edit")->name("biodata.edit");
// update data
Route::post("/biodata-mahasiswa/{id}/update", "BiodataController@update")->name("biodata.update");
// delete data
Route::get("/biodata-mahasiswa/{id}/delete", "BiodataController@destroy")->name("biodata.destroy");

// });

