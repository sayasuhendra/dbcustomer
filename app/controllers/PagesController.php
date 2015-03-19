<?php

class PagesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$marginusd = Biayacostumercircuit::where('currency','USD')->sum('mrc') - ( Biayabackhaulvendor::where('currency','USD')->sum('mrc') + Biayalastmilevendor::where('currency','USD')->sum('mrc') );

		$marginidr = Biayacostumercircuit::where('currency','IDR')->sum('mrc') - ( Biayabackhaulvendor::where('currency','IDR')->sum('mrc') + Biayalastmilevendor::where('currency','IDR')->sum('mrc') );

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

		return View::make('pages.index', ['marginidr' => $marginidr, 'marginusd' => $marginusd, 'cirb' => $cirb, 'cirt' => $cirt]);
	}

}