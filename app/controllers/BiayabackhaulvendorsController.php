<?php

class BiayabackhaulvendorsController extends BaseController {

	/**
	 * Biayabackhaulvendor Repository
	 *
	 * @var Biayabackhaulvendor
	 */
	protected $biayabackhaulvendor;

	public function __construct(Biayabackhaulvendor $biayabackhaulvendor)
	{
		$this->biayabackhaulvendor = $biayabackhaulvendor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$biayabackhaulvendors = $this->biayabackhaulvendor->all();

		return View::make('biayabackhaulvendors.index', compact('biayabackhaulvendors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('biayabackhaulvendors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Biayabackhaulvendor::$rules);

		if ($validation->passes())
		{
			$this->biayabackhaulvendor->create($input);

			return Redirect::route('biayabackhaulvendors.index');
		}

		return Redirect::route('biayabackhaulvendors.create')
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
		$biayabackhaulvendor = $this->biayabackhaulvendor->findOrFail($id);

		return View::make('biayabackhaulvendors.show', compact('biayabackhaulvendor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$biayabackhaulvendor = $this->biayabackhaulvendor->find($id);

		if (is_null($biayabackhaulvendor))
		{
			return Redirect::route('biayabackhaulvendors.index');
		}

		return View::make('biayabackhaulvendors.edit', compact('biayabackhaulvendor'));
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
		$validation = Validator::make($input, Biayabackhaulvendor::$rules);

		if ($validation->passes())
		{
			$biayabackhaulvendor = $this->biayabackhaulvendor->find($id);
			$biayabackhaulvendor->update($input);

			return Redirect::route('biayabackhaulvendors.show', $id);
		}

		return Redirect::route('biayabackhaulvendors.edit', $id)
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
		$this->biayabackhaulvendor->find($id)->delete();

		return Redirect::route('biayabackhaulvendors.index');
	}

}
