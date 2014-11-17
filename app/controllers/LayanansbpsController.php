<?php

class LayanansbpsController extends BaseController {

	/**
	 * Layanansbp Repository
	 *
	 * @var Layanansbp
	 */
	protected $layanansbp;

	public function __construct(Layanansbp $layanansbp)
	{
		$this->layanansbp = $layanansbp;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$layanansbps = $this->layanansbp->get();
		
		return View::make('layanansbps.index', ['layanansbps' => $layanansbps]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$customer = Customer::lists('nama', 'id');
		
		return View::make('layanansbps.create', ['customer' => $customer]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputcircuit = Input::only('namaperangkat', 'keterangan', 'serialnumber', 'tipe', 'jenis', 'pemilik', 'nrc', 'mrc', 'currency', 'circuitid', 'activated_at', 'namasite', 'alamat', 'layanan', 'area', 'status', 'customer_id');

		$inputcontactteknis = array(		
			'cp' => Input::get('cpteknis'),
			'bagian' => Input::get('bagianteknis'),
			'jabatan' => Input::get('jabatanteknis'),
			'telepon' => Input::get('teleponteknis'),
			'email' => Input::get('emailteknis'),
			'keterangan' => Input::get('keteranganteknis')
		);

		$inputcontactbilling = array(				
			'cp' => Input::get('cp'),
			'bagian' => Input::get('bagian'),
			'jabatan' => Input::get('jabatan'),
			'telepon' => Input::get('telepon'),
			'email' => Input::get('email'),
			'keterangan' => Input::get('keteranganbilling')
		);

		$input = Input::all();
		$validation = Validator::make($input, Layanansbp::$rules);

		if ($validation->passes())
		{
			$this->layanansbp->create($inputcircuit);
			$circuitid = Input::get('circuitid');
			$circuitini = Layanansbp::where('circuitid', '=', $circuitid)->first();

			$circuitini->contacts()->create($inputcontactteknis);
			$circuitini->contacts()->create($inputcontactbilling);

			return Redirect::route('layanansbps.index');
		}

		return Redirect::route('layanansbps.create')
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function tambahkontak($id)
	{
			$inputcontact = Input::only('bagian', 'cp', 'jabatan', 'telepon', 'email', 'keterangan');
			$layanansbp = $this->layanansbp->find($id);
			$layanansbp->contacts()->create($inputcontact);	

			return Redirect::route('layanansbps.show', $id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$layanansbp = $this->layanansbp->with('contacts')->findOrFail($id);		
		$customer = Customer::with('customercontacts')->where('id', $layanansbp->customer_id)->first();

		return View::make('layanansbps.show', ['layanansbp' => $layanansbp, 'customer' => $customer]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$layanansbp = $this->layanansbp->find($id);
		$customer = Customer::lists('nama', 'id');
		$namabackhaul = Backhaul::lists('nama', 'nama');
		$circuitidlastmile = Lastmile::lists('circuitidlastmile', 'circuitidlastmile');
		$vendor = Backhaul::lists('namavendor', 'namavendor');		

		if (is_null($layanansbp))
		{
			return Redirect::route('layanansbps.index');
		}

		return View::make('layanansbps.edit', ['layanansbp' => $layanansbp, 'customer' => $customer, 'namabackhaul' => $namabackhaul, 'circuitidlastmile' => $circuitidlastmile, 'vendor' => $vendor]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Input::has('username')){
			$inputnonadsl = Input::all();
		} else {
			$inputnonadsl = Input::except('username', 'password');
		}

		$input = array_except($inputnonadsl, '_method');
		$validation = Validator::make($input, Layanansbp::$rules);

		if ($validation->passes())
		{
			$layanansbp = $this->layanansbp->find($id);
			$layanansbp->update($input);

			return Redirect::route('layanansbps.show', $id);
		}

		return Redirect::route('layanansbps.edit', $id)
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
		$circuit = $this->layanansbp->find($id);

		$circuit->contacts()->delete();		
		$circuit->delete();

		return Redirect::route('layanansbps.index');
	}

}
