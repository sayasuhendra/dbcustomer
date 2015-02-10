<?php

use Laracasts\Presenter\PresentableTrait;

class Lastmile extends Eloquent {

	protected $guarded = array();

	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\LastmilesPresenter';

	public static $rules = array(
		'circuitidlastmile' => 'required'
	);

	public function getDates()
	{
	    return array('created_at', 'activated_at', 'updated_at');
	}

	public function circuits()
	{
		return $this->hasOne('Costumercircuit', 'circuitidlastmile', 'circuitidlastmile');
	}

	public function backhauls()
	{
		return $this->belongsTo('Backhaul', 'namabackhaul', 'nama');
	}

	public function vendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

	public function am()
	{
		return $this->belongsTo('Contactvendor', 'cp', 'am');
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

	public function customer()
	{
		if($this->circuits)
		{
			return Customer::where('customerid', $this->circuits->customer_id)->pluck('nama');
		}

		return "No Customer";
	}

}
