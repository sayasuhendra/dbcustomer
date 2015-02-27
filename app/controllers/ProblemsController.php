<?php

class ProblemsController extends BaseController {

	/**
	 * Problem Repository
	 *
	 * @var Problem
	 */
	protected $problem;

	public function __construct(Problem $problem)
	{
		$this->problem = $problem;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$problems = $this->problem->all();

		return View::make('problems.index', compact('problems'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$customers = Customer::lists('nama', 'nama');
		
		return View::make('problems.create', ['customers' => $customers]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Problem::$rules);

		if ($validation->passes())
		{
			$this->problem->create($input);

			return Redirect::route('problems.index');
		}

		return Redirect::route('problems.create')
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
		$problem = $this->problem->findOrFail($id);

		return View::make('problems.show', compact('problem'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$problem = $this->problem->find($id);

		if (is_null($problem))
		{
			return Redirect::route('problems.index');
		}

		$customers = Customer::lists('nama', 'nama');


		return View::make('problems.edit', ['problem' => $problem, 'customers' => $customers]);
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
		$validation = Validator::make($input, Problem::$rules);

		if ($validation->passes())
		{
			$problem = $this->problem->find($id);
			$problem->update($input);

			return Redirect::route('problems.show', $id);
		}

		return Redirect::route('problems.edit', $id)
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
		$this->problem->find($id)->delete();

		return Redirect::route('problems.index');
	}

}
