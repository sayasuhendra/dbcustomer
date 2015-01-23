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
		$costumercircuits = $this->costumercircuit->with('biayas')->get();
		
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
		
		$circuitidlastmile = Lastmiletmp::lists('circuitidlastmile', 'circuitidlastmile');
		

		return View::make('costumercircuits.create', ['customer' => $customer, 'circuitidlastmile' => $circuitidlastmile]);
	}

	public function tambahkontak($id)
	{
			$inputcontact = Input::only('bagian', 'cp', 'jabatan', 'telepon', 'email', 'keterangan');
			$costumercircuit = $this->costumercircuit->find($id);
			$costumercircuit->contacts()->create($inputcontact);	

			return Redirect::route('costumercircuits.show', $id);
	}

	public function tambahperangkat($id)
	{
			$inputperangkat = Input::only('namaperangkat', 'serialnumber', 'tipe', 'jenis', 'pemilik');
			$costumercircuit = $this->costumercircuit->find($id);
			$costumercircuit->perangkats()->create($inputperangkat);	

			return Redirect::route('costumercircuits.show', $id);
	}

	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputcircuit = Input::only('circuitid', 'activated_at', 'namasite', 'alamat', 'layanan', 'bandwidth', 'satuan', 'area', 'status', 'customer_id', 'circuitidlastmile', 'keteranganck');
		$inputbiaya = Input::only('nrc', 'mrc', 'currency');
		$inputperangkat = Input::only('namaperangkat', 'serialnumber', 'tipe', 'jenis', 'pemilik');

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

			$circuitidlastmile = Input::get('circuitidlastmile');

			$lastmileini = Lastmile::where('circuitidlastmile', $circuitidlastmile)->first();

			$circuitini->namabackhaul = $lastmileini->namabackhaul;
			$circuitini->namavendor = $lastmileini->namavendor;
			$circuitini->save();

			$biayavendor = Biayalastmilevendor::where('circuitidlastmile', '=', $circuitidlastmile)->first();

			$circuitini->biayas()->create($inputbiaya);
			$circuitini->contacts()->create($inputcontactteknis);
			$circuitini->contacts()->create($inputcontactbilling);
			$circuitini->perangkats()->create($inputperangkat);

			$tmpini = Lastmiletmp::where('circuitidlastmile', $circuitidlastmile);
			$tmpini->delete();
			
			// $circuitini->mrcvendor = $biayavendor->mrc;
			// $circuitini->currency = $biayavendor->currency;
			// $circuitini->save();

			
			if (Input::get('layanan') == 'ADSL')
				{	
					$inputadsl = Input::only('username', 'password', 'nomer', 'tumpangan');
					$circuitini->adsls()->create($inputadsl);
				}

			return Redirect::route('costumercircuits.index');
		}

		return Redirect::route('costumercircuits.create')
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
		
		$costumercircuit = $this->costumercircuit->with('contacts', 'adsls', 'biayas', 'perangkats', 'biayavendors')->findOrFail($id);		
		$customer = Customer::with('customercontacts')->where('id', $costumercircuit->customer_id)->first();
		$vendor = Vendor::with('contactvendors')->where('nama', $costumercircuit->namavendor)->first();
		$lastmile = Lastmile::with('biayas')->where('circuitidlastmile', $costumercircuit->circuitidlastmile)->first();
		$backhaul = Backhaul::with('biayas')->where('nama', $costumercircuit->namabackhaul)->first();
		if( isset( $backhaul->switchterkoneksi )) {
		$backhaulswitch = Backhaulswitch::where('nama', $backhaul->switchterkoneksi)->first();
	} else $backhaulswitch = [];

		return View::make('costumercircuits.show', ['backhaulswitch' => $backhaulswitch, 'costumercircuit' => $costumercircuit, 'costumercircuit' => $costumercircuit, 'customer' => $customer, 'vendor' => $vendor, 'lastmile' => $lastmile, 'backhaul' => $backhaul]);
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
		$customer = Customer::lists('nama', 'id');
		$namabackhaul = Backhaul::lists('nama', 'nama');
		$circuitidlastmile = Lastmile::lists('circuitidlastmile', 'circuitidlastmile');
		$vendor = Backhaul::lists('namavendor', 'namavendor');		

		if (is_null($costumercircuit))
		{
			return Redirect::route('costumercircuits.index');
		}

		return View::make('costumercircuits.edit', ['costumercircuit' => $costumercircuit, 'customer' => $customer, 'namabackhaul' => $namabackhaul, 'circuitidlastmile' => $circuitidlastmile, 'vendor' => $vendor]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputbiayas = Input::only('nrc', 'mrc', 'currency');
		$inputcircuit = Input::except('nrc', 'mrc', 'currency');

		$input = array_except($inputcircuit, '_method');
		$inputbiaya = array_except($inputbiayas, '_method');
		$validation = Validator::make($input, Costumercircuit::$rules);

		if ($validation->passes())
		{
			$costumercircuit = $this->costumercircuit->find($id);
			$costumercircuit->update($input);
			$costumercircuit->biayas()->update($inputbiaya);

			return Redirect::route('costumercircuits.index');
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
		$circuit = $this->costumercircuit->find($id);

		$circuit->contacts()->delete();
		$circuit->adsls()->delete();
		$circuit->biayas()->delete();
		$circuit->perangkats()->delete();
		
		$circuit->delete();

		return Redirect::route('costumercircuits.index');
	}

}
