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

		return View::make('pages.index', ['marginidr' => $marginidr, 'marginusd' => $marginusd, 'cirb' => $cirb, 'cirt' => $cirt, 'datagraph' => $datagraph]);
	}

}