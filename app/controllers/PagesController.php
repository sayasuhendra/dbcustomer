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
		return View::make('pages.index', ['marginidr' => $marginidr, 'marginusd' => $marginusd]);
	}

}
