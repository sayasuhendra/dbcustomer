<?php

class VendorsController extends BaseController {

	/**
	 * Vendor Repository
	 *
	 * @var Vendor
	 */
	protected $vendor;

	public function __construct(Vendor $vendor)
	{
		$this->vendor = $vendor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vendors = $this->vendor->all();

		return View::make('vendors.index', compact('vendors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vendors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Vendor::$rules);

		if ($validation->passes())
		{
			$this->vendor->create($input);

			return Redirect::route('vendors.index');
		}

		return Redirect::route('vendors.create')
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
		$vendor = $this->vendor->findOrFail($id);

		return View::make('vendors.show', compact('vendor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vendor = $this->vendor->find($id);

		if (is_null($vendor))
		{
			return Redirect::route('vendors.index');
		}

		return View::make('vendors.edit', compact('vendor'));
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
		$validation = Validator::make($input, Vendor::$rules);

		if ($validation->passes())
		{
			$vendor = $this->vendor->find($id);
			$vendor->update($input);

			return Redirect::route('vendors.show', $id);
		}

		return Redirect::route('vendors.edit', $id)
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
		$this->vendor->find($id)->delete();

		return Redirect::route('vendors.index');
	}

}
