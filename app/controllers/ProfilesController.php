<?php

use Acme\Forms\ProfileForm;
use Acme\Forms\PasswordForm;

class ProfilesController extends BaseController {

	/**
	 * @var ProfileForm
	 */
	protected $profileForm;
	protected $passwordForm;

	/**
	 * @param ProfileForm $profileForm
	 */
	function __construct(ProfileForm $profileForm, PasswordForm $passwordForm)
	{
		$this->profileForm = $profileForm;
		$this->passwordForm = $passwordForm;

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

		return View::make('profiles.show', [ 'user' => $user ]);
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

	public function editPassword($username)
	{
		$user = $this->getUserByUsername($username);

		return View::make('profiles.editpw')->withUser($user);
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

	public function updatePassword($username)
	{

		$user = $this->getUserByUsername($username);
		$passwordlama = Input::get('passwordlama');
		$passwordbaru = Input::get('passwordbaru');
		$passwordconfirm = Input::get('passwordbaru_confirmation');

		if (! Hash::check($passwordlama, $user->password)) {
			
			return Redirect::back()->withInput()->withFlashMessage('Password lama yang Anda masukkan salah.');

		}

		$this->passwordForm->validate(Input::all());

		$user->password = $passwordbaru;
		$user->save();
		return View::make('profiles.pwedited', ['passwordbaru' => $passwordbaru]);

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
