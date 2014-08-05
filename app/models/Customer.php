<?php

class Customer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'customerid' => 'required',
		'nama' => 'required',
		'alamat' => 'required',
		'level' => 'required'
	);

	public function getDates()
	{
	    return array('created_at', 'register_at', 'updated_at');
	}

	public function customercontacts()
	{
		return $this->morphMany('Customercontact', 'contactable');
	}

	public function circuits()
	{
		return $this->hasMany('Costumercircuit');
	}
}
