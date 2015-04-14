<?php

class Costumercircuitperangkat extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	public static $rules = array(
		'namaperangkat' => 'required',
		'serialnumber' => 'required',
		'tipe' => 'required',
		'jenis' => 'required'
	);

	public function costumercircuits()
	{
		return $this->belongsTo('Costumercircuit', 'costumercircuit_id', 'id');
	}
}
