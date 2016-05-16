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

		//Libros
		Route::get('items/books',['uses'=>'ItemsController@indexBooks',
		'as'=>'tk.items.books.index']);
		Route::get('items/books/create',['uses'=>'ItemsController@createBooks',
		'as'=>'tk.items.books.create']);
		Route::post('items/books',['uses'=>'ItemsController@storeBooks',
		'as'=>'tk.items.books.store']);

		//Items en general
		Route::get('items/{id}/assign',['uses'=>'ItemsController@assign',
			'as'=>'tk.items.assign']);
		Route::post('items/{id}/assing',['uses'=>'ItemsController@update',
			'as'=>'tk.items.update']);
		Route::get('items/{id}/users',['uses'=>'ItemsController@showUsers',
			'as'=>'tk.items.users']);

		//Laptops
		Route::get('items/laptops',['uses'=>'ItemsController@indexLaptops',
		'as'=>'tk.items.laptops.index']);
		Route::get('items/laptops/create',['uses'=>'ItemsController@createLaptops',
		'as'=>'tk.items.laptops.create']);
		Route::post('items/laptops',['uses'=>'ItemsController@storeLaptops',
		'as'=>'tk.items.laptops.store']);


		//Otros
		Route::get('items/others',['uses'=>'ItemsController@indexOthers',
		'as'=>'tk.items.others.index']);
		Route::get('items/others/create',['uses'=>'ItemsController@createOthers',
		'as'=>'tk.items.others.create']);
		Route::post('items/others',['uses'=>'ItemsController@storeOthers',
		'as'=>'tk.items.others.store']);

	});


