<?php

class BackhaulsController extends BaseController {

	/**
	 * Backhaul Repository
	 *
	 * @var Backhaul
	 */
	protected $backhaul;

	public function __construct(Backhaul $backhaul)
	{
		$this->backhaul = $backhaul;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$backhauls = $this->backhaul->all();

		return View::make('backhauls.index', compact('backhauls'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backhauls.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Backhaul::$rules);

		if ($validation->passes())
		{
			$this->backhaul->create($input);

			return Redirect::route('backhauls.index');
		}

		return Redirect::route('backhauls.create')
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
		$backhaul = $this->backhaul->findOrFail($id);

		return View::make('backhauls.show', compact('backhaul'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$backhaul = $this->backhaul->find($id);

		if (is_null($backhaul))
		{
			return Redirect::route('backhauls.index');
		}

		return View::make('backhauls.edit', compact('backhaul'));
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
		$validation = Validator::make($input, Backhaul::$rules);

		if ($validation->passes())
		{
			$backhaul = $this->backhaul->find($id);
			$backhaul->update($input);

			return Redirect::route('backhauls.show', $id);
		}

		return Redirect::route('backhauls.edit', $id)
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
		$this->backhaul->find($id)->delete();

		return Redirect::route('backhauls.index');
	}

}
