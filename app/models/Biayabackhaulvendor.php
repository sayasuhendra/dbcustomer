<?php

class Biayabackhaulvendor extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	public static $rules = array(
	);

	public function backhauls()
	{
		return $this->belongsTo('Backhaul', 'circuitidbackhaul', 'circuitidbackhaul');
	}
}
