<?php

class Biayacostumercircuit extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
	);

	public function circuits()
	{
		return $this->belongsTo('Costumercircuit', 'costumercircuit_id', 'id');
	}
}
