<?php

class CostumercircuitsController extends BaseController {

	/**
	 * Costumercircuit Repository
	 *
	 * @var Costumercircuit
	 */
	protected $costumercircuit;

	public function __construct(Costumercircuit $costumercircuit)
	{
		$this->costumercircuit = $costumercircuit;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$costumercircuits = $this->costumercircuit->with('contacts', 'customers', 'biayas', 'adsls', 'lastmiles', 'vendors', 'biayavendors')->get();

		return View::make('costumercircuits.index', ['costumercircuits' => $costumercircuits]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$customer = Customer::lists('nama', 'id');
		$circuitidbackhaul = Backhaul::lists('circuitidbackhaul', 'id');
		$circuitidlastmile = Lastmile::lists('circuitidlastmile', 'id');
		$vendor = Vendor::lists('nama', 'id');

		return View::make('costumercircuits.create', ['customer' => $customer, 'circuitidbackhaul' => $circuitidbackhaul, 'circuitidlastmile' => $circuitidlastmile, 'vendor' => $vendor]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputcircuit = Input::only('circuitid', 'activated_at', 'namasite', 'alamat', 'layanan', 'bandwidth', 'satuan', 'circuitidlastmile', 'area', 'status', 'customer_id', 'backhaul_id', 'vendor_id');
		$inputbiaya = Input::only('nrc', 'mrc', 'currency');

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
			'keterangan' => Input::get('keterangan')
		);		

		$input = Input::all();
		$validation = Validator::make($input, Costumercircuit::$rules);

		if ($validation->passes())
		{
			$this->costumercircuit->create($inputcircuit);
			$circuitid = Input::get('circuitid');
			$circuitini = Costumercircuit::where('circuitid', '=', $circuitid)->first();
			$circuitini->biayas()->create($inputbiaya);
			$circuitini->contacts()->create($inputcontactteknis);
			$circuitini->contacts()->create($inputcontactbilling);
			if (Input::has('username') and Input::has('password')) 
				{	
					$inputadsl = Input::only('username', 'password');
					$circuitini->adsls()->create($inputadsl);
				}

			return Redirect::route('costumercircuits.index');
		}

		return Redirect::route('costumercircuits.create')
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
		$costumercircuit = $this->costumercircuit->findOrFail($id);

		return View::make('costumercircuits.show', compact('costumercircuit'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$costumercircuit = $this->costumercircuit->find($id);

		if (is_null($costumercircuit))
		{
			return Redirect::route('costumercircuits.index');
		}

		return View::make('costumercircuits.edit', compact('costumercircuit'));
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
		$validation = Validator::make($input, Costumercircuit::$rules);

		if ($validation->passes())
		{
			$costumercircuit = $this->costumercircuit->find($id);
			$costumercircuit->update($input);

			return Redirect::route('costumercircuits.show', $id);
		}

		return Redirect::route('costumercircuits.edit', $id)
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
		$this->costumercircuit->find($id)->delete();

		return Redirect::route('costumercircuits.index');
	}

}
