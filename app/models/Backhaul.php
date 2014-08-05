<?php

class Backhaul extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'vendor_id' => 'required',
		'circuitidbackhaul' => 'required',
		'lokasixconnect' => 'required',
		'switchterkoneksi' => 'required',
		'portterkoneksi' => 'required',
		'bandwidth' => 'required',
		'backhaulswitch_id' => 'required'
	);

	public function vendors()
	{
		return $this->belongsTo('Vendor');
	}

	public function circuits()
	{
		return $this->hasMany('Costumercircuit');
	}

	public function biayas()
	{
		return $this->hasOne('Biayabackhaulvendor', 'circuitidbackhaul');
	}

	public function switches()
	{
		return $this->belongsTo('Backhaulswitch');
	}

}
