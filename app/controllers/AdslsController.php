<?php

class AdslsController extends BaseController {

	/**
	 * Adsl Repository
	 *
	 * @var Adsl
	 */
	protected $adsl;

	public function __construct(Adsl $adsl)
	{
		$this->adsl = $adsl;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$adsls = $this->adsl->all();

		return View::make('adsls.index', compact('adsls'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('adsls.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Adsl::$rules);

		if ($validation->passes())
		{
			$this->adsl->create($input);

			return Redirect::route('adsls.index');
		}

		return Redirect::route('adsls.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$adsl = $this->adsl->findOrFail($id);

		return View::make('adsls.show', compact('adsl'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adsl = $this->adsl->find($id);

		if (is_null($adsl))
		{
			return Redirect::route('adsls.index');
		}

		return View::make('adsls.edit', compact('adsl'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Adsl::$rules);

		$adsl = $this->adsl->find($id);
		$adsl->update($input);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$adsls = $this->adsl->find($id);
		$circuit = $adsls->circuits;
		$adsls->circuits->layanan = "";
		$adsls->circuits->save();
		$adsls->delete();
		return Redirect::route('costumercircuits.show', $circuit->id);

	}

}
