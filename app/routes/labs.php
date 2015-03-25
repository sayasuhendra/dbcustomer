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
	$test1 = [1,2,3,4,5,6,7];
	$test2 = [1,2,3,4,5,6,7];
	$test = [];
	array_push($test, $test1);
	array_push($test, $test2);
	// echo json_encode($test);
	$t = '2015';
	${"data" . $t} = $test;
	dd($data2015);
});

Route::get('/ujicoba', function()
{

	$problem = Problem::first();
	$date1 = $problem->start;
	$date2 = $problem->finish;
	$format = 'd M Y - H:i';
	// $date1 = DateTime::createFromFormat($format, $date1);
	// $date1 = str_replace("-", " ", $date1);
	// $date2 = str_replace("-", " ", $date2);
	echo $date1 . ' - ' . $date2 . "\n" ;
	// $date1 = new DateTime($date1);
	// $date2 = new DateTime($date2);
	// dd($date1);
	$diff = abs(strtotime($date2) - strtotime($date1));

	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
	$minute = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ (60));
	$second = floor($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minute*60);

	printf("%d years, %d months, %d days, %d hours, %d minute, %d second \n", $years, $months, $days, $hours, $minute, $second);
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