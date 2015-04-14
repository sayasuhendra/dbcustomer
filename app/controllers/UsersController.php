<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::with('roles')->get();
        $perans = Role::lists('name', 'id');
        return View::make('users.index', ['users'=>$users, 'perans' => $perans]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}	

	public function activated($username)
	{
		$nama = $this->getUserByUsername($username);
		$nama->active = Input::get('active');
		$nama->save();
        return Redirect::to('users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($username)
	// {
	// 	$user = $this->getUserByUsername($username);
 //        return View::make('users.edit', compact('user'));
	// }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getUserByUsername($username)
	{
        return User::with('roles')->whereUsername($username)->firstOrFail();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($username)
	{
		$user = $this->getUserByUsername($username);
		$user->roles()->attach(Input::get('role'));
        return Redirect::to('users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($username)
	{
		$nama = $this->getUserByUsername($username);
		$nama->roles()->detach(Input::get('role'));
        return Redirect::to('users');
	}

}
