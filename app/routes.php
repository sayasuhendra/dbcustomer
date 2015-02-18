<?php

foreach (File::allFiles(__DIR__.'/routes') as $partial) {
	require_once $partial->getPathname();
}

Route::group(['before' => 'auth'], function(){

	Route::group(['before' => 'role:user'], function(){


		# Vendor

		Route::put('vendors/contacts/{vendors}', [
			'as' => 'vendorstambahkontak', 
			'before' => 'role:editor',
			'uses' => 'VendorsController@tambahkontak'
			]);

		Route::resource('vendors', 'VendorsController');

		Route::resource('contactvendors', 'ContactvendorsController');

		# Customer

		Route::resource('customers', 'CustomersController');

		Route::put('customers/contacts/{customers}', [
			'as' => 'customerstambahkontak', 
			'before' => 'role:editor',
			'uses' => 'CustomersController@tambahkontak'
			]);

		Route::resource('customercontacts', 'CustomercontactsController');


		# Customer Circuits

		Route::resource('costumercircuits', 'CostumercircuitsController');
		Route::put('costumercircuits/contacts/{costumercircuits}', [
			'as' => 'circuittambahkontak', 
			'before' => 'role:editor',
			'uses' => 'CostumercircuitsController@tambahkontak'
			]);

		Route::put('costumercircuits/perangkats/{costumercircuits}', [
			'as' => 'circuittambahperangkat', 
			'before' => 'role:editor',
			'uses' => 'CostumercircuitsController@tambahperangkat'
			]);

		Route::resource('biayacostumercircuits', 'BiayacostumercircuitsController');
		Route::resource('costumercircuitperangkats', 'CostumercircuitperangkatsController');

		# Terminated Circuits and Lastmile
		Route::resource('terminatedcircuits', 'CircuitsTerminatedController');
		Route::resource('terminatedlastmiles', 'LastmilesTerminatedController');

		# Lastmile

		Route::resource('lastmiles', 'LastmilesController');
		Route::post('lastmiles/create/formbackhaul', ['uses' => 'LastmilesController@formbackhaul']);
		Route::post('lastmiles/create/formam', ['uses' => 'LastmilesController@formam']);
		Route::resource('biayalastmilevendors', 'BiayalastmilevendorsController');


		# Backhaul

		Route::resource('backhauls', 'BackhaulsController');
		Route::resource('biayabackhaulvendors', 'BiayabackhaulvendorsController');

		# Layanan
		Route::resource('layanans', 'LayanansController');

		# Switches atau Perangkat
		Route::resource('backhaulswitches', 'BackhaulswitchesController');

		# Layanan SBP
		Route::resource('layanansbps', 'LayanansbpsController');
		Route::put('layanansbps/contacts/{layanansbps}', [
			'as' => 'layanansbptambahkontak', 
			'before' => 'role:editor',
			'uses' => 'LayanansbpsController@tambahkontak'
			]);


		Route::resource('adsls', 'AdslsController');


		# Roles
		Route::resource('roles', 'RolesController');

	});

	# Profile

	Route::group(['prefix' => 'user'], function(){

		Route::resource('profile', 'ProfilesController', ['only' => ['show', 'index', 'edit', 'update', 'destroy']]);
		Route::get('/profile/{username}/create', ['as' => 'profile.create', 'uses' => 'ProfilesController@create']);
		Route::post('/profile/{username}/store', ['as' => 'profile.store', 'uses' => 'ProfilesController@store']);
		Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);
		Route::get('/{username}/password', ['as' => 'editpassword', 'uses' => 'ProfilesController@editPassword']);
		Route::patch('/{username}/password', ['as' => 'updatepassword', 'uses' => 'ProfilesController@updatePassword']);

	});

	Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

});

# Reminder Password

Route::get('/lupapassword', ['as' => 'lupapassword', 'uses' => 'RemindersController@getRemind']);
Route::post('/lupapassword', ['as' => 'lupapassword', 'uses' => 'RemindersController@postRemind']);
Route::get('/password/reset/{token}', 'RemindersController@getReset');
Route::post('/password/reset', 'RemindersController@postReset');

# Registration

Route::get('/register', 'RegistrationController@create');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
Route::resource('user', 'RegistrationController', ['only' => ['edit', 'update']]);

# Home

# Authentication

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);


# Filter

// Route::when('*', 'csrf', ['put', 'post', 'patch', 'delete']);

Route::when('vendors/*', 'role:editor', ['put', 'post', 'patch', 'delete']);
Route::when('customers/*', 'role:editor', ['put', 'post', 'patch', 'delete']);

Route::when('lastmiles/*', 'role:editor', ['put', 'post', 'patch', 'delete']);
Route::when('backhauls/*', 'role:editor', ['put', 'post', 'patch', 'delete']);
Route::when('costumercircuits/*', 'role:editor', ['put', 'post', 'patch', 'delete']);

Route::when('layanans/*', 'role:editor', ['put', 'post', 'patch', 'delete']);
Route::when('layanansbps/*', 'role:editor', ['put', 'post', 'patch', 'delete']);

Route::when('backhaulswitches/*', 'role:editor', ['put', 'post', 'patch', 'delete']);