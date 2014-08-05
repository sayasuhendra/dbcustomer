<?php

class Vendor extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nama' => 'required',
		'alamat' => 'required'
	);

	public function backhauls()
	{
		return $this->hasMany('Backhaul');
	}

	public function lastmiles()
	{
		return $this->hasMany('Lastmile');
	}

	public function contacts()
	{
		return $this->hasMany('Contactvendor');
	}

	public function circuits()
	{
		return $this->hasMany('Costumercircuit');
	}
}
