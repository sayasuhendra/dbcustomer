<?php

class LastmilesController extends BaseController {

	/**
	 * Lastmile Repository
	 *
	 * @var Lastmile
	 */
	protected $lastmile;

	public function __construct(Lastmile $lastmile)
	{
		$this->lastmile = $lastmile;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lastmiles = $this->lastmile->all();

		return View::make('lastmiles.index', compact('lastmiles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$costumercircuit = Costumercircuit::lists('namasite', 'id');
		$vendor = Vendor::lists('nama', 'id');
		$circuitidbackhaul = Backhaul::lists('id', 'id');

		return View::make('lastmiles.create', ['costumercircuit' => $costumercircuit, 'vendor' => $vendor, 'circuitidbackhaul' => $circuitidbackhaul]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Lastmile::$rules);

		if ($validation->passes())
		{
			$this->lastmile->create($input);

			return Redirect::route('lastmiles.index');
		}

		return Redirect::route('lastmiles.create')
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
		$lastmile = $this->lastmile->findOrFail($id);

		return View::make('lastmiles.show', compact('lastmile'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lastmile = $this->lastmile->find($id);

		if (is_null($lastmile))
		{
			return Redirect::route('lastmiles.index');
		}

		return View::make('lastmiles.edit', compact('lastmile'));
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
		$validation = Validator::make($input, Lastmile::$rules);

		if ($validation->passes())
		{
			$lastmile = $this->lastmile->find($id);
			$lastmile->update($input);

			return Redirect::route('lastmiles.show', $id);
		}

		return Redirect::route('lastmiles.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->lastmile->find($id)->delete();

		return Redirect::route('lastmiles.index');
	}

}
