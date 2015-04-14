<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

	protected $rules = [
		'username' => 'required|unique:users',
		'nama_lengkap' => 'required',
		'level' => 'required',
		'bagian' => 'required',
		'area' => 'required',
		'email'    => ['required', 'email', 'unique:users', 'regex:/\w+@sbp\.net\.id/'],
		'password' => 'required|confirmed'
	];
} 