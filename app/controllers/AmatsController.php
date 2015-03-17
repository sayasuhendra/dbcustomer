<?php

class AmatsController extends BaseController {

	/**
	 * Amat Repository
	 *
	 * @var Amat
	 */
	protected $amat;

	public function __construct(Amat $amat)
	{
		$this->amat = $amat;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$amats = $this->amat->all();

		return View::make('amats.index', compact('amats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('amats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Amat::$rules);

		if ($validation->passes())
		{
			$this->amat->create($input);

			return Redirect::route('amats.index');
		}

		return Redirect::route('amats.create')
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
		$amat = $this->amat->findOrFail($id);

		return View::make('amats.show', compact('amat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$amat = $this->amat->find($id);

		if (is_null($amat))
		{
			return Redirect::route('amats.index');
		}

		return View::make('amats.edit', compact('amat'));
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
		$validation = Validator::make($input, Amat::$rules);

		if ($validation->passes())
		{
			$amat = $this->amat->find($id);
			$amat->update($input);

			return Redirect::route('amats.show', $id);
		}

		return Redirect::route('amats.edit', $id)
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
		$this->amat->find($id)->delete();

		return Redirect::route('amats.index');
	}

}
