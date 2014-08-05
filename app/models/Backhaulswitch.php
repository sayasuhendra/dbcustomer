<?php

class Backhaulswitch extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nama' => 'required',
		'jenis' => 'required',
		'jumlahportfo' => 'required',
		'jumlahportrj' => 'required',
		'area' => 'required',
		'lokasi' => 'required'
	);

	public function backhauls()
	{
		return $this->hasMany('Backhaul');
	}
}
