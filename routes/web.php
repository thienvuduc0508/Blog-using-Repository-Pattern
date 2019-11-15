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

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/detail/{id}', 'PostController@show')->name('post.detail');
Route::post('comment/{id}', 'CommentController@createCommentInPost')->name('comment.create');
Route::get('comment/{id}', 'CommentController@show')->name('comment.show');




Auth::routes();

Route::group(['middleware' => ['auth']], function (){
    Route::group(['prefix' => 'admin'],function (){
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::group(['prefix' => 'post'], function (){
            Route::get('/','PostController@index')->name('post.index');
            Route::get('create/','PostController@create')->name('post.create');
            Route::post('create/','PostController@store')->name('post.store');
            Route::get('edit/{id}','PostController@edit')->name('post.edit');
            Route::post('update/{id}','PostController@update')->name('post.update');
            Route::get('delete/{id}', 'PostController@destroy')->name('post.delete');

        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
            Route::post('update/{id}', 'UserController@update')->name('user.update');
            Route::get('delete/{id}', 'UserController@destroy')->name('user.delete');
            Route::get('detail/{id}', 'UserController@detail')->name('user.detail');

        });
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', 'RoleController@index')->name('role.index');
            Route::get('create/','RoleController@create')->name('role.create');
            Route::post('create/','RoleController@store')->name('role.store');
            Route::get('edit/{id}', 'RoleController@edit')->name('role.edit');
            Route::post('update/{id}', 'RoleController@update')->name('role.update');
            Route::get('delete/{id}', 'RoleController@destroy')->name('role.delete');

        });
        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', 'PermissionController@index')->name('permission.index');
            Route::get('create/','PermissionController@create')->name('permission.create');
            Route::post('create/','PermissionController@store')->name('permission.store');
            Route::get('edit/{id}', 'PermissionController@edit')->name('permission.edit');
            Route::post('update/{id}', 'PermissionController@update')->name('permission.update');
            Route::get('delete/{id}', 'PermissionController@destroy')->name('permission.delete');

        });
    });

    });

