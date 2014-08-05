<?php

class CostumercircuitperangkatsController extends BaseController {

	/**
	 * Costumercircuitperangkat Repository
	 *
	 * @var Costumercircuitperangkat
	 */
	protected $costumercircuitperangkat;

	public function __construct(Costumercircuitperangkat $costumercircuitperangkat)
	{
		$this->costumercircuitperangkat = $costumercircuitperangkat;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$costumercircuitperangkats = $this->costumercircuitperangkat->all();

		return View::make('costumercircuitperangkats.index', compact('costumercircuitperangkats'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('costumercircuitperangkats.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Costumercircuitperangkat::$rules);

		if ($validation->passes())
		{
			$this->costumercircuitperangkat->create($input);

			return Redirect::route('costumercircuitperangkats.index');
		}

		return Redirect::route('costumercircuitperangkats.create')
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
		$costumercircuitperangkat = $this->costumercircuitperangkat->findOrFail($id);

		return View::make('costumercircuitperangkats.show', compact('costumercircuitperangkat'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$costumercircuitperangkat = $this->costumercircuitperangkat->find($id);

		if (is_null($costumercircuitperangkat))
		{
			return Redirect::route('costumercircuitperangkats.index');
		}

		return View::make('costumercircuitperangkats.edit', compact('costumercircuitperangkat'));
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
		$validation = Validator::make($input, Costumercircuitperangkat::$rules);

		if ($validation->passes())
		{
			$costumercircuitperangkat = $this->costumercircuitperangkat->find($id);
			$costumercircuitperangkat->update($input);

			return Redirect::route('costumercircuitperangkats.show', $id);
		}

		return Redirect::route('costumercircuitperangkats.edit', $id)
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
		$this->costumercircuitperangkat->find($id)->delete();

		return Redirect::route('costumercircuitperangkats.index');
	}

}
