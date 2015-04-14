<?php

class Biayacostumercircuit extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	public static $rules = array(
	);

	public function circuits()
	{
		return $this->belongsTo('Costumercircuit', 'costumercircuit_id', 'id');
	}
}
