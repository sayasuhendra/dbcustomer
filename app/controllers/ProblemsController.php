<?php

class ProblemsController extends BaseController {

	/**
	 * Problem Repository
	 *
	 * @var Problem
	 */
	protected $problem;

	public function __construct(Problem $problem)
	{
		$this->problem = $problem;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$problems = $this->problem->where('status', 'Close')->get();

		return View::make('problems.index', compact('problems'));
	}

	public function indexOpen()
	{
		$problems = $this->problem->where('status', 'Open')->get();

		return View::make('problems.index', compact('problems'));
	}

	public function indexAll()
	{
		$problems = $this->problem->all();

		return View::make('problems.indexall', compact('problems'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$circuits = Costumercircuit::lists('namasite', 'id');
		$pilih = ['Tidak Dipilih' => 'Silahkan Pilih'];
		$category = array_merge($pilih, Problemopt::lists('category', 'category'));
		$masalah = array_merge($pilih, Problemopt::lists('problem', 'problem'));
		$sub = array_merge($pilih, Problemopt::lists('sub', 'sub'));

		return View::make('problems.create', ['circuits' => $circuits, 'category' => $category, 'masalah' => $masalah, 'sub' => $sub]);
	}

	public function optCat()
	{
        $return = '<option value=""></option>';
        foreach(Problemopt::where('segment', Input::get('segment'))->groupBy('category')->get() as $problemopt) 
            $return .= "<option value='$problemopt->category'>$problemopt->category</option>";
        return $return;
	}

	public function optProb()
	{
        $return = '<option value=""></option>';
        foreach(Problemopt::where('category', Input::get('category'))->where('segment', Input::get('segment'))->groupBy('problem')->get() as $problemopt) 
            $return .= "<option value='$problemopt->problem'>$problemopt->problem</option>";
        return $return;
	}

	public function optSub()
	{
        $return = '<option value=""></option>';
        foreach(Problemopt::where('problem', Input::get('problem'))->where('category', Input::get('category'))->where('segment', Input::get('segment'))->groupBy('sub')->get() as $problemopt) 
            $return .= "<option value='$problemopt->sub'>$problemopt->sub</option>";
        return $return;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();

		$circuit = Costumercircuit::find($_POST['circuit']);
		$customer = Customer::find($circuit->customer_id);
		$datatambahan = [
						 'circuit' => $circuit->namasite,
					 	 'area' => $circuit->area,
					 	 'vendor' => $circuit->namavendor,
					 	 'customer' => $customer->nama,
					 	 'csc' => Auth::user()->nama_lengkap
					 	 ];

		$input = array_merge($input, $datatambahan);

		$start = $_POST['start'];
		$finish = $_POST['finish'];

		if (Input::get('status') == "Close") {
			$waktu = hitungWaktu($start, $finish);
			$input = array_merge($input, $waktu);
		}

		$validation = Validator::make($input, Problem::$rules);

		if ($validation->passes())
		{
			$this->problem->create($input);

			$id = $this->problem->where('tt', Input::get('tt'))->first()->id;
			return Redirect::route('problems.show', $id);
		}

		return Redirect::route('problems.create')
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
		$problem = $this->problem->findOrFail($id);

		return View::make('problems.show', compact('problem'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$problem = $this->problem->find($id);

		if (is_null($problem))
		{
			return Redirect::route('problems.index');
		}

		$circuits = Costumercircuit::lists('namasite', 'id');

		$pilih = ['Tidak Dipilih' => 'Silahkan Pilih'];
		$category = array_merge($pilih, Problemopt::lists('category', 'category'));
		$masalah = array_merge($pilih, Problemopt::lists('problem', 'problem'));
		$sub = array_merge($pilih, Problemopt::lists('sub', 'sub'));

		return View::make('problems.edit', ['circuits' => $circuits, 'category' => $category, 'problem' => $problem, 'masalah' => $masalah, 'sub' => $sub]);
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

		$circuit = Costumercircuit::find($_POST['circuit']);
		$customer = Customer::find($circuit->customer_id);
		$datatambahan = [
						 'circuit' => $circuit->namasite,
					 	 'area' => $circuit->area,
					 	 'vendor' => $circuit->namavendor,
					 	 'customer' => $customer->nama,
					 	 'csc' => Auth::user()->nama_lengkap
					 	 ];

		$input = array_merge($input, $datatambahan);

		$start = $_POST['start'];
		$finish = $_POST['finish'];
		$waktu = hitungWaktu($start, $finish);
		$input = array_merge($input, $waktu);

		$validation = Validator::make($input, Problem::$rules);

		if ($validation->passes())
		{
			$problem = $this->problem->find($id);
			$problem->update($input);

			return Redirect::route('problems.show', $id);
		}

		return Redirect::route('problems.edit', $id)
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
		$status = $this->problem->find($id)->status;

		$this->problem->find($id)->delete();

		if ($status == "Open") {
			return Redirect::route('problemsopen');
		}
		
		return Redirect::route('problems.index');
	}

}
