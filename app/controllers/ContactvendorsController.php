<?php

class ContactvendorsController extends BaseController {

	/**
	 * Contactvendor Repository
	 *
	 * @var Contactvendor
	 */
	protected $contactvendor;

	public function __construct(Contactvendor $contactvendor)
	{
		$this->contactvendor = $contactvendor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contactvendors = $this->contactvendor->all();

		return View::make('contactvendors.index', compact('contactvendors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contactvendors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Contactvendor::$rules);

		if ($validation->passes())
		{
			$this->contactvendor->create($input);

			return Redirect::route('vendors.show', Input::only('vendor_id'));
		}

		return Redirect::route('contactvendors.create')
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
		$contactvendor = $this->contactvendor->findOrFail($id);

		return View::make('contactvendors.show', compact('contactvendor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contactvendor = $this->contactvendor->find($id);

		if (is_null($contactvendor))
		{
			return Redirect::route('contactvendors.index');
		}

		return View::make('contactvendors.edit', compact('contactvendor'));
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
		$validation = Validator::make($input, Contactvendor::$rules);

		if ($validation->passes())
		{
			$contactvendor = $this->contactvendor->find($id);
			$contactvendor->update($input);

			return Redirect::route('vendors.show', $contactvendor->vendor_id);
		}

		return Redirect::route('contactvendors.edit', $id)
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
		$contact = $this->contactvendor->find($id);

		$id = $contact->vendor_id;

		$contact->delete();

		return Redirect::route('vendors.show', $id);
	}

}
