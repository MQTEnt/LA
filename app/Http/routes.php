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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function(){
	return view('index');
});
Route::get('checkdb',function(){
	echo DB::connection()->getDatabaseName();
});


Route::get('list','StudentsController@getList');
Route::post('add','StudentsController@postAdd');
Route::get('edit/{id}',['as'=>'getEdit','uses'=>'StudentsController@getEdit']);
Route::post('edit/{id}',['as'=>'postEdit','uses'=>'StudentsController@postEdit']);
Route::get('delete/{id}',['as'=>'getDelete','uses'=>'StudentsController@getDelete']);