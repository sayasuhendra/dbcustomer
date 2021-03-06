<?php

class CustomercontactsController extends BaseController {

	/**
	 * Customercontact Repository
	 *
	 * @var Customercontact
	 */
	protected $customercontact;

	public function __construct(Customercontact $customercontact)
	{
		$this->customercontact = $customercontact;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customercontacts = $this->customercontact->all();

		return View::make('customercontacts.index', compact('customercontacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$id = $customer->id;
		$contacts = Customer::find($id)->customercontacts;
		return View::make('customercontacts.create', ['contacts' => $contacts]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Customercontact::$rules);

		if ($validation->passes())
		{
			$this->customercontact->create($input);

			return Redirect::route('customercontacts.index');
		}

		return Redirect::route('customercontacts.create')
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
		$customercontact = $this->customercontact->findOrFail($id);

		return View::make('customercontacts.show', compact('customercontact'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customercontact = $this->customercontact->find($id);

		if (is_null($customercontact))
		{
			return Redirect::route('customercontacts.index');
		}

		return View::make('customercontacts.edit', compact('customercontact'));
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
		$validation = Validator::make($input, Customercontact::$rules);

		if ($validation->passes())
		{
			$customercontact = $this->customercontact->find($id);
			$customercontact->update($input);

			if ( $customercontact->contactable_type == 'Customer')
				{

					return Redirect::route('customers.show', $customercontact->contactable_id);
				}
			elseif ( $customercontact->contactable_type == 'Costumercircuit') 
				{
					return Redirect::route('costumercircuits.show', $customercontact->contactable_id);
				}
			elseif ( $customercontact->contactable_type == 'Layanansbp') 
				{
					return Redirect::route('layanansbps.show', $customercontact->contactable_id);
				}
		}

		return Redirect::route('customercontacts.edit', $id)
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
		$contact = $this->customercontact->find($id);
			

		if ( $contact->contactable_type == 'Customer')
			{

				$id = $contact->contactable_id;

				$contact->delete();

				return Redirect::route('customers.show', $id);
			}
		elseif ( $contact->contactable_type == 'Costumercircuit') 
			{
				$id = $contact->contactable_id;

				$contact->delete();

				return Redirect::route('costumercircuits.show', $id);
			}
		elseif ( $contact->contactable_type == 'Layanansbp') 
			{
				$id = $contact->contactable_id;

				$contact->delete();

				return Redirect::route('layanansbps.show', $id);
			}
	}

}
