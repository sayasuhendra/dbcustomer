<?php

class BiayalastmilevendorsController extends BaseController {

	/**
	 * Biayalastmilevendor Repository
	 *
	 * @var Biayalastmilevendor
	 */
	protected $biayalastmilevendor;

	public function __construct(Biayalastmilevendor $biayalastmilevendor)
	{
		$this->biayalastmilevendor = $biayalastmilevendor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$biayalastmilevendors = $this->biayalastmilevendor->all();

		return View::make('biayalastmilevendors.index', compact('biayalastmilevendors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('biayalastmilevendors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Biayalastmilevendor::$rules);

		if ($validation->passes())
		{
			$this->biayalastmilevendor->create($input);

			return Redirect::route('biayalastmilevendors.index');
		}

		return Redirect::route('biayalastmilevendors.create')
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
		$biayalastmilevendor = $this->biayalastmilevendor->findOrFail($id);

		return View::make('biayalastmilevendors.show', compact('biayalastmilevendor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$biayalastmilevendor = $this->biayalastmilevendor->find($id);

		if (is_null($biayalastmilevendor))
		{
			return Redirect::route('biayalastmilevendors.index');
		}

		return View::make('biayalastmilevendors.edit', compact('biayalastmilevendor'));
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
		$validation = Validator::make($input, Biayalastmilevendor::$rules);

		if ($validation->passes())
		{
			$biayalastmilevendor = $this->biayalastmilevendor->find($id);
			$biayalastmilevendor->update($input);

			return Redirect::route('biayalastmilevendors.show', $id);
		}

		return Redirect::route('biayalastmilevendors.edit', $id)
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
		$this->biayalastmilevendor->find($id)->delete();

		return Redirect::route('biayalastmilevendors.index');
	}

}
