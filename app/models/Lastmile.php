<?php

class Lastmile extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'circuitidlastmile' => 'required',
		'vlanid' => 'required',
		'vlanname' => 'required',
		'ipaddressptp' => 'required',
		'blockippubliccustomer' => 'required',
		'backhaul_id' => 'required',
		'costumercircuit_id' => 'required'
	);

	public function circuits()
	{
		return $this->belongsTo('Costumercircuit');
	}

	public function backhauls()
	{
		return $this->belongsTo('Vendor');
	}

	public function biayas()
	{
		return $this->hasOne('Biayalastmilevendor');
	}
}
