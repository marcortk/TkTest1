<?php
Route::get('/', ['as'=>'tk.index','middleware'=>'auth', function () {
    return view('welcome');
}]);

Route::group(['prefix'=>'tk','middleware'=>['auth','admin']], function (){
    Route::get('users', ['uses'=>'UsersController@index', 'as'=>'tk.users.index']);
    Route::get('users/create', ['uses'=>'UsersController@create', 'as'=>'tk.users.create']);
    Route::post('items/users', ['uses'=>'UsersController@store', 'as'=>'tk.users.store']);

    Route::get('items/books', ['uses'=>'ItemsController@indexBooks', 'as'=>'tk.items.books.index']);
    Route::get('items/books/create', ['uses'=>'ItemsController@createBooks', 'as'=>'tk.items.books.create']);
    Route::post('items/books', ['uses'=>'ItemsController@storeBooks', 'as'=>'tk.items.books.store']);

    Route::get('items/mouses', ['uses'=>'ItemsController@indexMouses', 'as'=>'tk.items.mouses.index']);
    Route::get('items/mouses/create', ['uses'=>'ItemsController@createMouses', 'as'=>'tk.items.mouses.create']);
    Route::post('items/mouses', ['uses'=>'ItemsController@storeMouses', 'as'=>'tk.items.mouses.store']);

    Route::get('items/{id}/assign', ['uses'=>'ItemsController@assign', 'as'=>'tk.items.assign']);
    Route::post('items/{id}/assing', ['uses'=>'ItemsController@update', 'as'=>'tk.items.update']);
    Route::get('items/{id}/users', ['uses'=>'ItemsController@showUsers', 'as'=>'tk.items.users']);
    Route::get('items/{id}/state', ['uses'=>'ItemsController@changeState', 'as'=>'tk.items.state']);

    Route::get('items/laptops', ['uses'=>'ItemsController@indexLaptops',    'as'=>'tk.items.laptops.index']);
    Route::get('items/laptops/create', ['uses'=>'ItemsController@createLaptops', 'as'=>'tk.items.laptops.create']);
    Route::post('items/laptops', ['uses'=>'ItemsController@storeLaptops', 'as'=>'tk.items.laptops.store']);
    
    Route::get('items/others', ['uses'=>'ItemsController@indexOthers', 'as'=>'tk.items.others.index']);
    Route::get('items/others/create', ['uses'=>'ItemsController@createOthers', 'as'=>'tk.items.others.create']);
    Route::post('items/others', ['uses'=>'ItemsController@storeOthers', 'as'=>'tk.items.others.store']);
});

    Route::group(['prefix'=>'worker','middleware'=>['auth','worker']], function(){
        Route::get('items/book',['uses'=>'WorkerController@book','as'=>'worker.items.book']);
        Route::get('items/laptop',['uses'=>'WorkerController@laptop','as'=>'worker.items.laptop']);
        Route::get('items/mouse',['uses'=>'WorkerController@mouse','as'=>'worker.items.mouse']);
        Route::get('items/other',['uses'=>'WorkerController@other','as'=>'worker.items.other']);
        Route::get('/{id}/damaged',['uses'=>'WorkerController@damaged','as'=>'worker.damaged']);
        Route::post('/{id}/damaged',['uses'=>'WorkerController@report','as'=>'worker.report']);
        Route::get('/myReport',['uses'=>'WorkerController@myReport','as'=>'worker.myReport']);

    });

    Route::get('admin/auth/login',[
        'uses'=>'Auth\AuthController@getLogin',
        'as'=>'admin.auth.login']);
    Route::post('admin/auth/login',[
        'uses'=>'Auth\AuthController@postLogin','as'=>'admin.auth.login']);
    Route::get('admin/auth/logout',[
        'uses'=>'Auth\AuthController@logout',
        'as'=>'admin.auth.logout']);