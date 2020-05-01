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
    return view('dashboard');
});


Route::get("/mail/send", "MailController@send");

Route::get("/login", "LoginController@showLoginForm")->name("login");
Route::post("/login", "LoginController@login")->name("login.login");

Route::get("/logout", "LoginController@logout")->name("logout");




Route::prefix("biodata-mahasiswa")->middleware("auth")->name("biodata.")->group(function (){
// list mahasiswa
Route::get("/", "BiodataController@index")->name("index");
// detail mahasiswa
Route::get("/{id}/detail", "BiodataController@show")->name("show");
// create new data
Route::get("/create", "BiodataController@create")->name("create");
// input data
Route::post("/", "BiodataController@store")->name("store");
// edit data
Route::get("/{id}/edit", "BiodataController@edit")->name("edit");
// update data
Route::post("/{id}/update", "BiodataController@update")->name("update");
// delete data
Route::get("/{id}/delete", "BiodataController@destroy")->name("destroy");

// export excel
Route::get("/excel", "BiodataController@excel")->name("excel");

// send email

});


// Route::resource("biodata", "BiodataController");

