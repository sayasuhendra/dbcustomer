<?php

use Acme\Forms\RegistrationForm;

class RegistrationController extends BaseController {

	/**
	 * @var RegistrationForm
	 */
	private $registrationForm;

	/**
	 * @param RegistrationForm $registrationForm
	 */
	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('username', 'email', 'password', 'password_confirmation', 'nama_lengkap', 'level', 'bagian', 'area');
		
		$this->registrationForm->validate($input);

		$user = User::create($input);

		$input= (object) $input;

		return View::make('registration.show', ['input' => $input]);

	}

}
