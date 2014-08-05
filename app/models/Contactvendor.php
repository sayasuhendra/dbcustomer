<?php

class Contactvendor extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nama' => 'required',
		'bagian' => 'required',
		'telepon' => 'required',
		'email' => 'required',
		'vendor_id' => 'required'
	);

	public function vendors()
	{
		return $this->belongsTo('Vendor');
	}
}
