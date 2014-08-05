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

		$this->beforeFilter('currentUser', ['only' => ['edit', 'update']]);
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
		$input = Input::only('location', 'bio', 'twitter_username', 'github_username');

		$this->profileForm->validate($input);
		$user->profile()->create($input);

		return Redirect::route('profile.show', $user->username);
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
		$input = Input::only('location', 'bio', 'twitter_username', 'github_username');

		$this->profileForm->validate($input);

		$user->profile->fill($input)->save();

		return Redirect::route('profile.edit', $user->username);
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

}
