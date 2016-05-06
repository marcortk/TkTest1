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

Route::get('/',['as'=>'tk.index', function () {
    return view('welcome');
}]);
Route::group(['prefix'=>'tk'], function (){
		Route::resource('users','UsersController');

		//Route::resource('items','ItemsController');
		Route::get('items/books',['uses'=>'ItemsController@indexBooks',
		'as'=>'tk.items.books']);

		Route::get('items/laptops',['uses'=>'ItemsController@indexLaptops',
		'as'=>'tk.items.laptops']);

		Route::get('items/others',['uses'=>'ItemsController@indexOthers',
		'as'=>'tk.items.others']);

	});


