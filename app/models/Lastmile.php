<?php

class Lastmile extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'circuitidlastmile' => 'required'
	);

	public function circuits()
	{
		return $this->hasMany('Costumercircuit', 'circuitidlastmile', 'circuitidlastmile');
	}

	public function backhauls()
	{
		return $this->belongsTo('Backhaul', 'namabackhaul', 'nama');
	}

	public function vendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

	public function namavendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

	public function biayas()
	{
		return $this->hasOne('Biayalastmilevendor', 'circuitidlastmile', 'circuitidlastmile');
	}

	public function adsls()
	{
		return $this->hasOne('Adsl', 'lastmile_id', 'id');
	}
}
