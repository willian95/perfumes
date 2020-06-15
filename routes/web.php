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
    Route::get("/admin/category/fetch/all", "CategoryController@fetchAll");
    Route::post("/admin/category/store", "CategoryController@store");
    Route::post("/admin/category/delete", "CategoryController@delete");
    Route::get("/admin/category/fetch/{page}", "CategoryController@fetch");
    Route::post("/admin/category/update", "CategoryController@update");

    Route::get("/admin/brand/index", "BrandController@index");
    Route::get("/admin/brand/fetch/all", "BrandController@fetchAll");
    Route::post("/admin/brand/store", "BrandController@store");
    Route::post("/admin/brand/delete", "BrandController@delete");
    Route::get("/admin/brand/fetch/{page}", "BrandController@fetch");
    Route::post("/admin/brand/update", "BrandController@update");

    Route::get("/admin/type/index", "TypeController@index");
    Route::get("/admin/type/fetch/all", "TypeController@fetchAll");
    Route::post("/admin/type/store", "TypeController@store");
    Route::post("/admin/type/delete", "TypeController@delete");
    Route::get("/admin/type/fetch/{page}", "TypeController@fetch");
    Route::post("/admin/type/update", "TypeController@update");

    Route::get("/admin/size/index", "SizeController@index");
    Route::get("/admin/size/fetch/all", "SizeController@fetchAll");
    Route::post("/admin/size/store", "SizeController@store");
    Route::post("/admin/size/delete", "SizeController@delete");
    Route::get("/admin/size/fetch/{page}", "SizeController@fetch");
    Route::post("/admin/size/update", "SizeController@update");

    Route::get("/admin/user/index", "UserController@index");
    Route::get("/admin/user/fetch/{page}", "UserController@fetch");
    Route::get("/admin/user/shopping/{user_id}", "UserController@shopping");
    Route::get("/admin/user/shopping/{page}/user/{user_id}", "ShoppingController@fetchByUser");

    Route::get("/admin/product/index", "ProductController@index");
    Route::get("/admin/product/create", "ProductController@create");
    Route::get("/admin/product/fetch/{page}", "ProductController@fetch");
    Route::get("/admin/product/edit/{id}", "ProductController@edit");
    Route::get("/admin/product/product-type/{id}", "ProductController@productTypeFetch");
    Route::post("/admin/product/store", "ProductController@store");
    Route::post("/admin/product/update", "ProductController@update");
    Route::post("/admin/product/delete", "ProductController@delete");

    Route::get("/admin/shopping/index", "ShoppingController@index");
    Route::get("/admin/shopping/fetch/{page}", "ShoppingController@fetch");



});
