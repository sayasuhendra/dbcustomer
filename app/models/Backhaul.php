<?php

class Backhaul extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		
		'circuitidbackhaul' => 'required'
	);

	public function vendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

	public function circuits()
	{
		return $this->hasMany('Costumercircuit', 'namabackhaul', 'nama');
	}

	public function biayas()
	{
		return $this->hasOne('Biayabackhaulvendor', 'circuitidbackhaul', 'circuitidbackhaul');
	}

	public function switches()
	{
		return $this->belongsTo('Backhaulswitch', 'switchterkoneksi', 'nama');
	}

	public function lastmiles()
	{
		return $this->hasMany('Backhaul', 'namabackhaul', 'nama');
	}

}
