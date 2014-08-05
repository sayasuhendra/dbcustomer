<?php

class BiayacostumercircuitsController extends BaseController {

	/**
	 * Biayacostumercircuit Repository
	 *
	 * @var Biayacostumercircuit
	 */
	protected $biayacostumercircuit;

	public function __construct(Biayacostumercircuit $biayacostumercircuit)
	{
		$this->biayacostumercircuit = $biayacostumercircuit;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$biayacostumercircuits = $this->biayacostumercircuit->all();

		return View::make('biayacostumercircuits.index', compact('biayacostumercircuits'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('biayacostumercircuits.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Biayacostumercircuit::$rules);

		if ($validation->passes())
		{
			$this->biayacostumercircuit->create($input);

			return Redirect::route('biayacostumercircuits.index');
		}

		return Redirect::route('biayacostumercircuits.create')
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
		$biayacostumercircuit = $this->biayacostumercircuit->findOrFail($id);

		return View::make('biayacostumercircuits.show', compact('biayacostumercircuit'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$biayacostumercircuit = $this->biayacostumercircuit->find($id);

		if (is_null($biayacostumercircuit))
		{
			return Redirect::route('biayacostumercircuits.index');
		}

		return View::make('biayacostumercircuits.edit', compact('biayacostumercircuit'));
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
		$validation = Validator::make($input, Biayacostumercircuit::$rules);

		if ($validation->passes())
		{
			$biayacostumercircuit = $this->biayacostumercircuit->find($id);
			$biayacostumercircuit->update($input);

			return Redirect::route('biayacostumercircuits.show', $id);
		}

		return Redirect::route('biayacostumercircuits.edit', $id)
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
		$this->biayacostumercircuit->find($id)->delete();

		return Redirect::route('biayacostumercircuits.index');
	}

}
