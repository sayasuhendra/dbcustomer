<?php

# Route Labs


Route::get('/ujicoba', function()
{
	$marginusd = Biayacostumercircuit::where('currency','USD')->sum('mrc') - ( Biayabackhaulvendor::where('currency','USD')->sum('mrc') + Biayalastmilevendor::where('currency','USD')->sum('mrc') );

	$marginidr = Biayacostumercircuit::where('currency','IDR')->sum('mrc') - ( Biayabackhaulvendor::where('currency','IDR')->sum('mrc') + Biayalastmilevendor::where('currency','IDR')->sum('mrc') );

	$cirb = [];

	$cirt = [];

	$datalengkap = [];

	$header = ['Month', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

	array_push($datalengkap, $header);

	foreach (range(2005, 2015) as $tahun) {

		foreach (range(1,12) as $bln) {
			$jumlah = Costumercircuit::select(DB::raw('count(*) as jumlah'))
				                     ->whereRaw("year(activated_at)=$tahun and month(activated_at)=$bln")
				                     ->get();
	         $cirb[$tahun][$bln] = $jumlah[0]['jumlah'];
		}

		$jml = Costumercircuit::select(DB::raw('count(*) as jumlah'))
			                     ->whereRaw("year(activated_at)=$tahun")
			                     ->get();

		$cirt[$tahun] = $jml[0]['jumlah'];

	}

	foreach (range(2010, 2015) as $tahun) {

		${"data".$tahun} = [];
		${"data" . $tahun}[] = "$tahun - $cirt[$tahun]";

		foreach (range(1,12) as $bln) {
			$jumlah = Costumercircuit::select(DB::raw('count(*) as jumlah'))
				                     ->whereRaw("year(activated_at)=$tahun and month(activated_at)=$bln")
				                     ->get();

	        array_push( ${"data" . $tahun}, $jumlah[0]['jumlah']);
		}
		    array_push($datalengkap, ${"data".$tahun});
	}

	$datagraph = json_encode($datalengkap);

	$cust = Customer::all();

	return View::make('test', compact(['marginidr', 'marginusd', 'cirb', 'cirt', 'datagraph', 'cust']));
});


# Post via git
# Berhasil

// Route::group(['before'=>'role:master'], function(){

	Route::get('logindewa', function(){
		return View::make('sessions.dewa');
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
	$img = Image::make(public_path() . '/foto/suhendra.jpg');
	dd($img);

    // return $img->response('jpg');
	// $img = Image::make('http://www.kids-center.org/images/10401836/image001.jpg');

	// return $img->response('jpg');

	// return Response::make($image, '200', ['Content-Type' => 'image/jpg']);
	// echo "<img src='/foto/suhendra.jpg' alt='foto suhendra'>";
});

Route::post('ajax/form/lastmile', [
	'as' => 'ajaxlastmile', 
	'uses' => 'AjaxController@lastmile'
	]);

Route::get('/test', function() 
{
	return View::make('registration/show');
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