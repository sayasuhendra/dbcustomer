<?php

use Acme\Forms\ProfileForm;

class ProfilesController extends BaseController {

	/**
	 * @var ProfileForm
	 */
	protected $profileForm;

	/**
	 * @param ProfileForm $profileForm
	 */
	function __construct(ProfileForm $profileForm)
	{
		$this->profileForm = $profileForm;

		// $this->beforeFilter('currentUser', ['only' => ['edit', 'update']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::with('profile')->get();
		
		return View::make('profiles.index', ['users' => $users]);
	}


	/**
	 * /username
	 *
	 * @param $username
	 * @return Response
	 */
	public function show($username)
	{
		$user = $this->getUserByUsername($username);

		return View::make('profiles.show')->withUser($user);
	}

	/**
	 * /profiles/username/edit
	 *
	 * @param $username
	 * @return mixed
	 */
	public function edit($username)
	{
		$user = $this->getUserByUsername($username);

		return View::make('profiles.edit')->withUser($user);
	}

	public function create($username)
	{
		$user = $this->getUserByUsername($username);

		return View::make('profiles.create')->withUser($user);
	}

	/**
	 * Create a user's profile
	 *
	 * @param $username
	 * @return mixed
	 * @throws Laracasts\Validation\FormValidationException
	 */
	public function store($username)
	{
		$user = $this->getUserByUsername($username);
		$input = Input::except('_token', 'foto');
		if(Input::has('foto'))
		{

			$foto = Input::file('foto');
			$namafoto = $username . '.' . $foto->getClientOriginalExtension();
			$input = array_merge($input, ['foto' => $namafoto]);
			$foto->move(public_path() .'/foto/', $namafoto);	

		}
		
		$this->profileForm->validate($input);
		$user->profile()->create($input);

		return Redirect::route('user.profile.show', $user->username);
	}

	/**
	 * Update a user's profile
	 *
	 * @param $username
	 * @return mixed
	 * @throws Laracasts\Validation\FormValidationException
	 */
	public function update($username)
	{
		$user = $this->getUserByUsername($username);
		$input = Input::only('panggilan', 'alamat', 'extention', 'hp', 'hp2', 'wa', 'bbm', 'email_kantor', 'email_lain', 'ym', 'twitter', 'facebook', 'skype', 'foto', 'keterangan');

		$user->profile()->update($input);

		return Redirect::route('user.profile.show', $user->username);
	}

	/**
	 * Fetch user
	 * (You can extract this to repository method)
	 *
	 * @param $username
	 * @return mixed
	 */
	public function getUserByUsername($username)
	{
		return User::with('profile')->whereUsername($username)->firstOrFail();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($username)
	{
		$user = $this->getUserByUsername($username);
		$user->profile()->delete();
		$user->delete();

		$users = User::with('profile')->get();
		
		return View::make('profiles.index', ['users' => $users]);

	}

}
