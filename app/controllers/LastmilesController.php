<?php

class LastmilesController extends BaseController {

	/**
	 * Lastmile Repository
	 *
	 * @var Lastmile
	 */
	protected $lastmile;

	public function __construct(Lastmile $lastmile)
	{
		$this->lastmile = $lastmile;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lastmiles = $this->lastmile->all();

		return View::make('lastmiles.index', compact('lastmiles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$vendor = Backhaul::lists('namavendor', 'namavendor');
		$namabackhaul = Backhaul::lists('nama', 'namavendor');

		return View::make('lastmiles.create', ['vendor' => $vendor, 'namabackhaul' => $namabackhaul]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputlastmile = Input::only('circuitidlastmile', 'activated_at', 'vlanid', 'vlanname', 'ipaddressptp', 'blockippubliccustomer', 'layanan', 'bandwidth', 'satuan', 'kawasan', 'keterangan', 'namabackhaul', 'namavendor', 'status');
		$inputbiaya = Input::only('nrc', 'mrc', 'currency');
		$input = Input::all();

		$validation = Validator::make($input, Lastmile::$rules);

		if ($validation->passes())
		{
			$this->lastmile->create($inputlastmile);
			$circuitidlastmile = Input::get('circuitidlastmile');
			$lastmileini = Lastmile::where('circuitidlastmile', '=', $circuitidlastmile)->first();

			$lastmileini->biayas()->create($inputbiaya);

			$tmp = new Lastmiletmp;
			$tmp->circuitidlastmile = $circuitidlastmile;
			$tmp->save();

			if (Input::has('username') and Input::has('password')) 
				{	
					$inputadsl = Input::only('username', 'password');
					$lastmileini->adsls()->create($inputadsl);
				}

			return Redirect::route('lastmiles.index');
		}

		return Redirect::route('lastmiles.create')
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
		$lastmile = $this->lastmile->findOrFail($id);
		$vendor = Vendor::with('contactvendors')->where('nama', $lastmile->namavendor)->first();

		return View::make('lastmiles.show', compact('lastmile', 'vendor'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lastmile = $this->lastmile->find($id);

		$vendor = Backhaul::lists('namavendor', 'namavendor');
		$namabackhaul = Backhaul::lists('nama', 'nama');

		if (is_null($lastmile))
		{
			return Redirect::route('lastmiles.index');
		}

		return View::make('lastmiles.edit', ['lastmile' => $lastmile, 'vendor' => $vendor, 'namabackhaul' => $namabackhaul]);
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
		$inputlastmiles = Input::only('circuitidlastmile', 'activated_at', 'vlanid', 'vlanname', 'ipaddressptp', 'blockippubliccustomer', 'layanan', 'bandwidth', 'satuan', 'kawasan', 'keterangan', 'namabackhaul', 'namavendor', 'status');

		$inputlastmile = array_except($inputlastmiles, '_method');
		$inputbiaya = array_except($inputbiayas, '_method');

		$validation = Validator::make($inputlastmile, Lastmile::$rules);

		if ($validation->passes())
		{
			$lastmile = $this->lastmile->find($id);
			$lastmile->update($inputlastmile);
			$lastmile->biayas()->update($inputbiaya);

			return Redirect::route('lastmiles.show', $id);
		}

		return Redirect::route('lastmiles.edit', $id)
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
		
		$lastmile = $this->lastmile->find($id);
		$lastmile->biayas()->delete();
		$lastmile->delete();

		return Redirect::route('lastmiles.index');
	}

}
