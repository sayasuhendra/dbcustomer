<?php

class Biayacostumercircuit extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nrc' => 'required',
		'mrc' => 'required'
	);

	public function circuits()
	{
		return $this->belongsTo('Costumercircuit');
	}
}
