<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class PasswordForm extends FormValidator {

	protected $rules = [
		'passwordlama' => 'required',
		'passwordbaru' => 'required|confirmed'
	];

} 