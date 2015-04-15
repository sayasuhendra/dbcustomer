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

	public function confirm($username, $code)
	{
		if( ! $code)
        {
            throw new InvalidConfirmationCodeException;
        }

        if( ! $username)
        {
            throw new InvalidConfirmationCodeException;
        }

		$user = User::whereUsername($username)->where('email_confirmation', $code)->first();

		$user->active = "1";
		$user->email_confirmation = null;
		$user->save();

		return Redirect::to('login')->with('message', 'Selamat, Account Anda Kini Telah Aktif. Silahkan Login.');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('username', 'email', 'password', 'password_confirmation', 'nama_lengkap', 'level', 'bagian', 'area');
		$inputprofil = Input::only('bbm', 'wa', 'hp', 'extention');

		$this->registrationForm->validate($input);

		$user = User::create($input);

		$user->profile()->create($inputprofil);

		$user->email_confirmation = str_random(30);
		$user->save();

		Mail::send('emails.register', ['username' => Input::get('username'), 'code' => $user->email_confirmation], function($message){
			$message->to(Input::get('email'), Input::get('nama_lengkap'))
					->subject('Please Confirm Your Email Address');
		});

		Mail::send('emails.registernotif', $input, function($message){
			$message->to('condev@sbp.net.id')
					->subject(Input::get('nama_lengkap') . ' mendaftar sebagai user CRM. Bagian: ' . Input::get('bagian'));
		});


		$inputsemua = (object) Input::all();

		return View::make('registration.show', ['input' => $inputsemua]);

	}

}
