<?php

class BackhaulswitchesController extends BaseController {

	/**
	 * Backhaulswitch Repository
	 *
	 * @var Backhaulswitch
	 */
	protected $backhaulswitch;

	public function __construct(Backhaulswitch $backhaulswitch)
	{
		$this->backhaulswitch = $backhaulswitch;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$backhaulswitches = $this->backhaulswitch->all();

		return View::make('backhaulswitches.index', compact('backhaulswitches'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backhaulswitches.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Backhaulswitch::$rules);

		if ($validation->passes())
		{
			$this->backhaulswitch->create($input);

			return Redirect::route('backhaulswitches.index');
		}

		return Redirect::route('backhaulswitches.create')
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
		$backhaulswitch = $this->backhaulswitch->findOrFail($id);
		$backhauls = Backhaul::where('switchterkoneksi', $backhaulswitch->nama)->get();

		return View::make('backhaulswitches.show', ['backhauls' => $backhauls, 'backhaulswitch' => $backhaulswitch]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$backhaulswitch = $this->backhaulswitch->find($id);

		if (is_null($backhaulswitch))
		{
			return Redirect::route('backhaulswitches.index');
		}

		return View::make('backhaulswitches.edit', compact('backhaulswitch'));
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
		$validation = Validator::make($input, Backhaulswitch::$rules);

		if ($validation->passes())
		{
			$backhaulswitch = $this->backhaulswitch->find($id);
			$backhaulswitch->update($input);

			return Redirect::route('backhaulswitches.show', $id);
		}

		return Redirect::route('backhaulswitches.edit', $id)
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
		try {

			$this->backhaulswitch->find($id)->delete();
			return Redirect::route('backhaulswitches.index');
			
		} catch (Exception $e) {
			$pesanerror = "Anda tidak dapat menghapus Switch ini, karena switch ini digunakan oleh beberapa backhaul berikut:";
			$backhaulswitch = $this->backhaulswitch->find($id);
			$backhauls = Backhaul::where('switchterkoneksi', $backhaulswitch->nama)->get();
			return View::make('backhaulswitches.error', ['pesanerror' => $pesanerror, 'backhauls' => $backhauls]);
		}

	}

}
