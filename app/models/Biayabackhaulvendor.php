<?php

class Biayabackhaulvendor extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nrc' => 'required',
		'mrc' => 'required',
		'circuitidbackhaul' => 'required'
	);

	public function backhauls()
	{
		return $this->belongsTo('Backhaul');
	}
}
