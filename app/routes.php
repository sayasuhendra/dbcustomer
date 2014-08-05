<?php

# Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

# Vendor
Route::resource('vendors', 'VendorsController');

Route::resource('customers', 'CustomersController');

Route::put('customers/contacts/{customers}', ['as' => 'customerstambahkontak', 'uses' => 'CustomersController@tambahkontak']);

Route::resource('costumercircuits', 'CostumercircuitsController');

Route::resource('customercontacts', 'CustomercontactsController');

Route::resource('adsls', 'AdslsController');

Route::resource('biayacostumercircuits', 'BiayacostumercircuitsController');

Route::resource('costumercircuitperangkats', 'CostumercircuitperangkatsController');

Route::resource('lastmiles', 'LastmilesController');



Route::resource('backhauls', 'BackhaulsController');

Route::resource('backhaulswitches', 'BackhaulswitchesController');



Route::resource('contactvendors', 'ContactvendorsController');

Route::resource('biayalastmilevendors', 'BiayalastmilevendorsController');

Route::resource('biayabackhaulvendors', 'BiayabackhaulvendorsController');

Route::resource('asals', 'AsalsController');

# Registration
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);

# Authentication
Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Profile

Route::resource('profile', 'ProfilesController', ['only' => ['show', 'edit', 'update']]);
Route::get('/profile/{username}/create', ['as' => 'profile.create', 'uses' => 'ProfilesController@create']);
Route::post('/profile/{username}/store', ['as' => 'profile.store', 'uses' => 'ProfilesController@store']);
Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);



