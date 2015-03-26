<?php

# Route Labs


# Post via git
# Berhasil

// Route::group(['before'=>'role:master'], function(){

	Route::get('logindewa', function(){
		return View::make('test');
	});

	Route::post('logindewa', 'SessionsController@logindewa');

// });

Route::post('git/upload', function($secret)
{
	if ($secret == 'c0nd3v') {
		
		`git pull`;

	}

});

# Latihan
Route::get('latihan/image', function()
{
	$img = Image::make(public_path() . 'foto/suhendra.jpg');

 //    return $img->response('jpg');
	// $img = Image::make('http://www.kids-center.org/images/10401836/image001.jpg');

	return $img->response('jpg');

	// return Response::make($image, '200', ['Content-Type' => 'image/jpg']);
	// echo "<img src='/foto/suhendra.jpg' alt='foto suhendra'>";
});

Route::post('ajax/form/lastmile', [
	'as' => 'ajaxlastmile', 
	'uses' => 'AjaxController@lastmile'
	]);

Route::get('/test', function() 
{
	$users = User::with('roles')->get();

	foreach ($users as $user) {

		echo $user->username . ": ";
		foreach ($user->roles as $peran) {
			echo $peran->name . "( " . $peran->id . " )" . ", ";
		}

		echo "<br>";
	}
});

Route::get('/ujicoba', function()
{

	Schema::create('permissions', function($table) {
	    $table->increments('id');
	    $table->integer('user_id');
	    $table->string('type');
	    $table->string('action');
	    $table->string('resource');
	    $table->timestamps();
	    
	    $table->index('user_id');
	});

	echo "Berhasil";
});

Route::filter('cache.fetch', 'Acme\Filters\CacheFilter@fetch');
Route::filter('cache.put', 'Acme\Filters\CacheFilter@put');
Route::get('cachelabs', function()
{
	// Cache::put('test', "Coba", 5);
	// Cache::forget('tost');
	// echo Cache::get('tost', "default");
	// Cache::remember('tost', 60, function(){
	return View::make('hello');
	// });
})->before('cache.fetch')->after('cache.put');

// Event::listen('illuminate.query', function($query)
// {
// 	var_dump($query);
// });

Route::get('/excel', function()
{
	Excel::load(public_path() . '/biayacircuits.xlsx', function($reader) {

		$biayacircuits = $reader->select(['id', 'nrc', 'mrc', 'currency'])->get();

		$biayacircuits->each(function($sheet){

			$sheet->each(function($row) {

				DB::table('biayacostumercircuits')->where('costumercircuit_id', $row->id)->update(['nrc' => $row->nrc, 'mrc' => $row->mrc, 'currency' => $row->currency]);

			});

		});

	});	

});

?>