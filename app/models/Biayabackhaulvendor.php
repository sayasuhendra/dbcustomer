<?php

class Biayabackhaulvendor extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
	);

	public function backhauls()
	{
		return $this->belongsTo('Backhaul', 'circuitidbackhaul', 'circuitidbackhaul');
	}
}
