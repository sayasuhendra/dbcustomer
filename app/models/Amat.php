<?php

class Amat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'contoh' => 'required'
	);
}
