<?php namespace Acme\Forms;

use Laracasts\Validation\FormValidator;

class ReminderForm extends FormValidator {

	protected $rules = [
		'email' => 'required',
		'password' => 'required|confirmed'
	];

} 