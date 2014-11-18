<?php

foreach (File::allFiles(__DIR__.'/routes') as $partial) {
	require_once $partial->getPathname();
}

# Post via git
Route::post('git/upload', function($secret)
{
	if ($secret == 'c0nd3v') {
		
		`git pull`;
		
	}

});

# Latihan
Route::get('latihan/image', function()
{
	$img = Image::make('foto/suhendra.jpg')->resize(20, 20);

 //    return $img->response('jpg');
	// $img = Image::make('http://www.kids-center.org/images/10401836/image001.jpg');

	return $img->response('jpg');

	// return Response::make($image, '200', ['Content-Type' => 'image/jpg']);
});


# Filter
Route::when('*', ['csrf', 'role:admin'], ['put', 'patch', 'delete']);

# Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

# Vendor

// Route::group(['before' => 'role:leader'], function(){

	Route::put('vendors/contacts/{vendors}', [
		'as' => 'vendorstambahkontak', 
		'uses' => 'VendorsController@tambahkontak'
		]);

	Route::resource('vendors', 'VendorsController');

// });

// Route::group(['before' => 'role:leader'], function(){

	Route::resource('customers', 'CustomersController');

	Route::put('customers/contacts/{customers}', ['as' => 'customerstambahkontak', 'uses' => 'CustomersController@tambahkontak']);

// });


Route::resource('costumercircuits', 'CostumercircuitsController');
Route::put('costumercircuits/contacts/{costumercircuits}', ['as' => 'circuittambahkontak', 'uses' => 'CostumercircuitsController@tambahkontak']);
Route::put('costumercircuits/perangkats/{costumercircuits}', ['as' => 'circuittambahperangkat', 'uses' => 'CostumercircuitsController@tambahperangkat']);

Route::resource('customercontacts', 'CustomercontactsController');

Route::resource('adsls', 'AdslsController');

Route::resource('biayacostumercircuits', 'BiayacostumercircuitsController');

Route::resource('costumercircuitperangkats', 'CostumercircuitperangkatsController');

Route::resource('lastmiles', 'LastmilesController');

Route::post('lastmiles/create/formbackhaul', ['uses' => 'LastmilesController@formbackhaul']);
Route::post('lastmiles/create/formam', ['uses' => 'LastmilesController@formam']);


Route::resource('backhauls', 'BackhaulsController');

Route::resource('layanans', 'LayanansController');

Route::resource('layanansbps', 'LayanansbpsController');
Route::put('layanansbps/contacts/{layanansbps}', ['as' => 'layanansbptambahkontak', 'uses' => 'LayanansbpsController@tambahkontak']);

Route::resource('backhaulswitches', 'BackhaulswitchesController');

Route::resource('contactvendors', 'ContactvendorsController');

Route::resource('biayalastmilevendors', 'BiayalastmilevendorsController');

Route::resource('biayabackhaulvendors', 'BiayabackhaulvendorsController');

# Registration
Route::get('/register', 'RegistrationController@create');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

Route::resource('user', 'RegistrationController', ['only' => ['edit', 'update']]);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Profile

Route::group(['prefix' => 'user'], function(){

Route::resource('profile', 'ProfilesController', ['only' => ['show', 'index', 'edit', 'update', 'destroy']]);
Route::get('/profile/{username}/create', ['as' => 'profile.create', 'uses' => 'ProfilesController@create']);
Route::post('/profile/{username}/store', ['as' => 'profile.store', 'uses' => 'ProfilesController@store']);
Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);

});

Route::resource('roles', 'RolesController');

