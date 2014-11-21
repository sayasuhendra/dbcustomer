<?php

# Route Labs


# Post via git
# Berhasil
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