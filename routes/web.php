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

Route::get("/login", "LoginController@index");
Route::post("/login", "LoginController@login");

Route::middleware(['admin'])->group(function () {
    
    Route::get("/admin/dashboard", function(){

        return view("admin.index");
    
    });

    Route::get("/admin/category/index", "CategoryController@index");
    Route::post("/admin/category/store", "CategoryController@store");
    Route::get("/admin/category/fetch/{page}", "CategoryController@fetch");

});
