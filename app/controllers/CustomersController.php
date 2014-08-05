<?php

class CustomersController extends BaseController {

	/**
	 * Customer Repository
	 *
	 * @var Customer
	 */
	protected $customer;

	public function __construct(Customer $customer)
	{
		$this->customer = $customer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customers = $this->customer->all();
		
		return View::make('customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('customers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputcustomer = Input::only('customerid', 'nama', 'alamat', 'level', 'register_at', 'npwp', 'alamatnpwp', 'keterangan');

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
		$validation = Validator::make($input, Customer::$rules);

		if ($validation->passes())
		{
			$this->customer->create($inputcustomer);
			$customerid = Input::get('customerid');
			$customerini = Customer::where('customerid', '=', $customerid)->first();
			$customerini->customercontacts()->create($inputcontactteknis);
			$customerini->customercontacts()->create($inputcontactbilling);


			return Redirect::route('customers.index');
		}

		return Redirect::route('customers.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function tambahkontak($id)
	{
			$inputcontact = Input::all();
			$customer = $this->customer->find($id);
			$customer->customercontacts()->create($inputcontact);	

			$customer = $this->customer->with('customercontacts', 'circuits')->findOrFail($id);
			$contacts = $customer->customercontacts;
			$circuits = $customer->circuits;

			return View::make('customers.show', ['customer' => $customer, 'contacts' => $contacts, 'circuits' => $circuits]);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = $this->customer->with('customercontacts', 'circuits')->findOrFail($id);

		$contacts = $customer->customercontacts;
		$circuits = $customer->circuits;

		return View::make('customers.show', ['customer' => $customer, 'contacts' => $contacts, 'circuits' => $circuits]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = $this->customer->find($id);

		if (is_null($customer))
		{
			return Redirect::route('customers.index');
		}

		return View::make('customers.edit', compact('customer'));
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
		$validation = Validator::make($input, Customer::$rules);

		if ($validation->passes())
		{
			$customer = $this->customer->find($id);
			$customer->update($input);

			return Redirect::route('customers.show', $id);
		}

		return Redirect::route('customers.edit', $id)
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
		$this->customer->find($id)->delete();

		return Redirect::route('customers.index');
	}

}
