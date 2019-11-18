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

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.index')->middleware('can:MOD');
        Route::group(['prefix' => 'post'], function () {
            Route::get('/', 'PostController@index')->name('post.index')->middleware('can:CRUD-post');
            Route::get('create/', 'PostController@create')->name('post.create')->middleware('can:CRUD-post');
            Route::post('create/', 'PostController@store')->name('post.store')->middleware('can:CRUD-post');
            Route::get('edit/{id}', 'PostController@edit')->name('post.edit')->middleware('can:CRUD-post');
            Route::post('update/{id}', 'PostController@update')->name('post.update')->middleware('can:CRUD-post');
            Route::get('delete/{id}', 'PostController@destroy')->name('post.delete')->middleware('can:CRUD-post');

        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index')->name('user.index')->middleware('can:CRUD-user');
            Route::get('edit/{id}', 'UserController@edit')->name('user.edit')->middleware('can:CRUD-user');
            Route::post('update/{id}', 'UserController@update')->name('user.update')->middleware('can:CRUD-user');
            Route::get('delete/{id}', 'UserController@destroy')->name('user.delete')->middleware('can:CRUD-user');
            Route::get('detail/{id}', 'UserController@detail')->name('user.detail')->middleware('can:CRUD-user');

        });
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', 'RoleController@index')->name('role.index')->middleware('can:CRUD-role');
            Route::get('create/', 'RoleController@create')->name('role.create')->middleware('can:CRUD-role');
            Route::post('create/', 'RoleController@store')->name('role.store')->middleware('can:CRUD-role');
            Route::get('edit/{id}', 'RoleController@edit')->name('role.edit')->middleware('can:CRUD-role');
            Route::post('update/{id}', 'RoleController@update')->name('role.update')->middleware('can:CRUD-role');
            Route::get('delete/{id}', 'RoleController@destroy')->name('role.delete')->middleware('can:CRUD-role');

        });
        Route::group(['prefix' => 'permission'], function () {
            Route::get('/', 'PermissionController@index')->name('permission.index');
            Route::get('create/',
                'PermissionController@create')->name('permission.create')->middleware('can:CRUD-permission');
            Route::post('create/',
                'PermissionController@store')->name('permission.store')->middleware('can:CRUD-permission');
            Route::get('edit/{id}',
                'PermissionController@edit')->name('permission.edit')->middleware('can:CRUD-permission');
            Route::post('update/{id}',
                'PermissionController@update')->name('permission.update')->middleware('can:CRUD-permission');
            Route::get('delete/{id}',
                'PermissionController@destroy')->name('permission.delete')->middleware('can:CRUD-permission');

        });
    });

});

