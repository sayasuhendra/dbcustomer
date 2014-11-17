<?php

# Route Labs

Route::post('ajax/form/lastmile', [
	'as' => 'ajaxlastmile', 
	'uses' => 'AjaxController@lastmile'
	]);

Route::get('/ujicoba', function()
{
	return View::make('test');
});

Route::get('/excel', function()
{
	Excel::load(public_path() . '/test.xlsx', function($reader) {

		var_dump($reader->get());

	});	

});

?>