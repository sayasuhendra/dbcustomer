<?php

class LayanansController extends BaseController {

	/**
	 * Layanan Repository
	 *
	 * @var Layanan
	 */
	protected $layanan;

	public function __construct(Layanan $layanan)
	{
		$this->layanan = $layanan;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$layanans = $this->layanan->all();

		return View::make('layanans.index', compact('layanans'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$namavendor = Vendor::lists('nama', 'nama');
		return View::make('layanans.create', ['namavendor' => $namavendor]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Layanan::$rules);

		if ($validation->passes())
		{
			$this->layanan->create($input);
			return Redirect::route('layanans.index');
		}

		return Redirect::route('layanans.create')
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
		$layanan = $this->layanan->findOrFail($id);

		return View::make('layanans.show', compact('layanan'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$layanan = $this->layanan->find($id);
		$namavendor = Vendor::lists('nama', 'nama');

		if (is_null($layanan))
		{
			return Redirect::route('layanans.index');
		}

		return View::make('layanans.edit', ['layanan' => $layanan, 'namavendor' => $namavendor]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
				
		$inputlayanan = array_except(Input::all(), '_method');
		
		$validation = Validator::make($inputlayanan, Layanan::$rules);

		if ($validation->passes())
		{
			$layanan = $this->layanan->find($id);
			$layanan->update($inputlayanan);

			return Redirect::route('layanans.show', $id);
		}

		return Redirect::route('layanans.edit', $id)
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
		$layananini = $this->layanan->find($id);
		$layananini->delete();

		return Redirect::route('layanans.index');
	}

}
