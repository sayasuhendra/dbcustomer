<?php

class Vendor extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nama' => 'required',
		'alamat' => 'required'
	);

	public function backhauls()
	{
		return $this->hasMany('Backhaul', 'namavendor', 'nama');
	}

	public function lastmiles()
	{
		return $this->hasMany('Lastmile', 'namavendor', 'nama');
	}

	public function contactvendors()
	{
		return $this->hasMany('Contactvendor');
	}

	public function costumercircuits()
	{
		return $this->hasMany('Costumercircuit', 'namavendor', 'nama');
	}
}
