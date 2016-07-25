<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// blog section
Route::get('/', function () {
    return redirect('/blog');
});
Route::get("blog", "BlogController@index");
Route::get("blog/{slug}", "BlogController@showPost");

// admin section
// Redirect requests to /admin to the /admin/post page
Route::get("admin", function () {
    return redirect("/admin/post");
});
// Start a routing group using the namespace Admin (which actually will expand
// out to App\Http\Controllers\Admin) and force the auth middleware to be active.
// Within the route group, add two Resource Controllers.
$router->group([
    "namespace" => "Admin",
    "middleware" => "auth"
], function () {
    Route::resource("admin/post", "PostController");
    Route::resource("admin/tag", "TagController", ["except" => "show"]);
    Route::get("admin/upload", "UploadController@index");
    Route::post("admin/upload/file", "UploadController@uploadFile");
    Route::delete("admin/upload/file", "UploadController@deleteFile");
    Route::post("admin/upload/folder", "UploadController@createFolder");
    Route::delete("admin/upload/folder", "UploadController@deleteFolder");
});

// logging in and out
// Here we add routes for logging in and logging out.
Route::get("/auth/login", "Auth\AuthController@getLogin");
Route::post("/auth/login", "Auth\AuthController@postLogin");
Route::get("/auth/logout", "Auth\AuthController@getLogout");
