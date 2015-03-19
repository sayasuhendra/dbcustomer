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
	return View::make('test');
});

Route::get('/ujicoba', function()
{
	// $data = DB::table('costumercircuits')
 //                     ->select(DB::raw('count(*) as jumlah'))
 //                     ->whereRaw('year(activated_at)=2014 and month(activated_at)=8')
 //                     ->get();
	$cirb = [];

	foreach (range(2005, 2015) as $tahun) {

		foreach (range(1,12) as $bln) {
			$jumlah = Costumercircuit::select(DB::raw('count(*) as jumlah'))
				                     ->whereRaw("year(activated_at)=$tahun and month(activated_at)=$bln")
				                     ->get();
	         $cirb[$tahun][$bln] = $jumlah[0]['jumlah'];
		}

	}

	$cirt = [];

	foreach (range(2005, 2015) as $tahun) {

			$jml = Costumercircuit::select(DB::raw('count(*) as jumlah'))
				                     ->whereRaw("year(activated_at)=$tahun")
				                     ->get();
			$cirt[$tahun] = $jml[0]['jumlah'];
	}

	$cir15 = [];

	foreach (range(1,12) as $bln) {
		$data = Costumercircuit::select(DB::raw('count(*) as jumlah'))
			                     ->whereRaw("year(activated_at)=2015 and month(activated_at)=$bln")
			                     ->get()
			                     ->toArray();
        $cir15[$bln] = $data[0]['jumlah'];
	}

	// echo $limabelas['2'][0]['jumlah'];
	// dd($limabelas);

	return View::make('test', ['cirb' => $cirb, 'cirt' => $cirt, 'cir15' => $cir15]);
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