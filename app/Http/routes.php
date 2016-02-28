<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'MainController@index');
Route::get('tags', array('as'=>'tags','uses'=>'TagsController@main'));
Route::post('tags', 'TagsController@add');
Route::get('tags/delete/{id}', 'TagsController@delete');
Route::get('tags/edit/{id}', 'TagsController@edit');
Route::post('tags/edit/{id}', 'TagsController@update');
Route::get('test', 'MainController@test');
Route::get('admin', array('as'=>'admin','uses'=>'Admin\MainController@index'));


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  // routes...
});
