<?php
Route::get('/', ['as'=>'tk.index', function () {
    return view('welcome');
}]);

Route::group(['prefix'=>'tk','middleware'=>'auth'], function (){
    Route::resource('users', 'UsersController');
    Route::get('items/books', ['uses'=>'ItemsController@indexBooks', 'as'=>'tk.items.books.index']);
    Route::get('items/books/create', ['uses'=>'ItemsController@createBooks', 'as'=>'tk.items.books.create']);
    Route::post('items/books', ['uses'=>'ItemsController@storeBooks', 'as'=>'tk.items.books.store']);

    Route::get('items/{id}/assign', ['uses'=>'ItemsController@assign', 'as'=>'tk.items.assign']);
    Route::post('items/{id}/assing', ['uses'=>'ItemsController@update', 'as'=>'tk.items.update']);
    Route::get('items/{id}/users', ['uses'=>'ItemsController@showUsers', 'as'=>'tk.items.users']);

    Route::get('items/laptops', ['uses'=>'ItemsController@indexLaptops',    'as'=>'tk.items.laptops.index']);
    Route::get('items/laptops/create', ['uses'=>'ItemsController@createLaptops', 'as'=>'tk.items.laptops.create']);
    Route::post('items/laptops', ['uses'=>'ItemsController@storeLaptops', 'as'=>'tk.items.laptops.store']);
    
    Route::get('items/others', ['uses'=>'ItemsController@indexOthers', 'as'=>'tk.items.others.index']);
    Route::get('items/others/create', ['uses'=>'ItemsController@createOthers', 'as'=>'tk.items.others.create']);
    Route::post('items/others', ['uses'=>'ItemsController@storeOthers', 'as'=>'tk.items.others.store']);
});


    Route::get('admin/auth/login',[
        'uses'=>'Auth\AuthController@getLogin',
        'as'=>'admin.auth.login']);
    Route::post('admin/auth/login',[
        'uses'=>'Auth\AuthController@postLogin','as'=>'admin.auth.login']);
    Route::get('admin/auth/logout',[
        'uses'=>'Auth\AuthController@logout',
        'as'=>'admin.auth.logout']);