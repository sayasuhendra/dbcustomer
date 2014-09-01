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
		$namaswitch = Backhaulswitch::lists('nama', 'nama');
		$namavendor = Vendor::lists('nama', 'nama');
		return View::make('backhauls.create', ['namaswitch' => $namaswitch, 'namavendor' => $namavendor]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$inputbiaya = Input::only('nrc', 'mrc', 'currency');		
		$inputbackhaul = Input::only('namavendor', 'nama', 'circuitidbackhaul', 'activated_at', 'switchterkoneksi', 'portterkoneksi', 'bandwidth', 'satuan');
		$validation = Validator::make($input, Backhaul::$rules);

		if ($validation->passes())
		{
			$this->backhaul->create($inputbackhaul);
			$circuitidbackhaul = Input::get('circuitidbackhaul');

			$backhaulini = Backhaul::where('circuitidbackhaul', $circuitidbackhaul)->first();
			$backhaulini->biayas()->create($inputbiaya);

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

		$namaswitch = Backhaulswitch::lists('nama', 'nama');
		$namavendor = Vendor::lists('nama', 'nama');

		if (is_null($backhaul))
		{
			return Redirect::route('backhauls.index');
		}

		return View::make('backhauls.edit', ['backhaul' => $backhaul, 'namaswitch' => $namaswitch, 'namavendor' => $namavendor]);
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
		$inputbackhauls = Input::only('namavendor', 'nama', 'circuitidbackhaul', 'activated_at', 'switchterkoneksi', 'portterkoneksi', 'bandwidth', 'satuan');

		$inputbackhaul = array_except($inputbackhauls, '_method');
		$inputbiaya = array_except($inputbiayas, '_method');
		
		$validation = Validator::make($inputbackhaul, Backhaul::$rules);

		if ($validation->passes())
		{
			$backhaul = $this->backhaul->find($id);
			$backhaul->update($inputbackhaul);
			$backhaul->biayas()->update($inputbiaya);

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
		$backhaulini = $this->backhaul->find($id);
		$backhaulini->biayas()->delete();
		$backhaulini->delete();

		return Redirect::route('backhauls.index');
	}

}
