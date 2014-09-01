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

	public function tambahkontak($id)
	{
			$inputcontact = Input::only('bagian', 'cp', 'jabatan', 'kawasan', 'telepon', 'email', 'keterangan');
			$vendor = $this->vendor->find($id);
			$vendor->contactvendors()->create($inputcontact);	

			return Redirect::route('vendors.show', $id);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputvendor = Input::only('nama', 'alamat', 'npwp', 'alamatnpwp', 'keterangan');

		$inputcontactteknis = array(		
			'cp' => Input::get('cpteknis'),
			'bagian' => Input::get('bagianteknis'),
			'jabatan' => Input::get('jabatanteknis'),
			'kawasan' => Input::get('kawasanteknis'),
			'telepon' => Input::get('teleponteknis'),
			'email' => Input::get('emailteknis'),
			'keterangan' => Input::get('keteranganteknis')
		);

		$inputcontactbilling = array(				
			'cp' => Input::get('cp'),
			'bagian' => Input::get('bagian'),
			'jabatan' => Input::get('jabatan'),
			'kawasan' => Input::get('kawasan'),
			'telepon' => Input::get('telepon'),
			'email' => Input::get('email'),
			'keterangan' => Input::get('keterangan')
		);

		$input = Input::all();
		$validation = Validator::make($input, Vendor::$rules);

		if ($validation->passes())
		{
			$this->vendor->create($inputvendor);
			$namavendor = Input::get('nama');
			$vendorini = Vendor::where('nama', '=', $namavendor)->first();
			$vendorini->contactvendors()->create($inputcontactteknis);
			$vendorini->contactvendors()->create($inputcontactbilling);

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
		$vendor = $this->vendor->with('contactvendors', 'backhauls', 'lastmiles')->findOrFail($id);

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
		$vendor = $this->vendor->find($id);
		$vendor->contactvendors()->delete();
		$vendor->delete();

		return Redirect::route('vendors.index');
	}
	

}
