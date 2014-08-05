<?php

class Costumercircuitperangkat extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'namaperangkat' => 'required',
		'serialnumber' => 'required',
		'tipe' => 'required',
		'jenis' => 'required',
		'costumercircuit_id' => 'required'
	);

	public function circuits()
	{
		return $this->belongsTo('Costumercircuit');
	}
}
