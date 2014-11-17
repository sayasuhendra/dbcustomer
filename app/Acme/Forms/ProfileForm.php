<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class ProfileForm extends FormValidator {

	protected $rules = [
		'extention' => 'required',
		'hp' => 'required',
		'hp2' => 'required',
		'wa' => 'required',
		'bbm' => 'required',
		'email_kantor' => 'required',
		'email_lain' => 'required',
		'ym' => 'required'
	];

} 