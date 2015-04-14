<?php

use Laracasts\Presenter\PresentableTrait;

class Costumercircuit extends Eloquent {

	use \Venturecraft\Revisionable\RevisionableTrait;
	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\CircuitsPresenter';

	protected $guarded = array();

	public static $rules = array(
		'circuitid' => 'required'
	);

	public function getDates()
	{
	    return array('created_at', 'updated_at');
	}

	public function contacts()
	{
		return $this->morphMany('Customercontact', 'contactable');
	}

	public function adsls()
	{
		return $this->hasOne('Adsl');
	}

	public function biayas()
	{
		return $this->hasOne('Biayacostumercircuit', 'costumercircuit_id', 'id');
	}

	public function perangkats()
	{
		return $this->hasMany('Costumercircuitperangkat', 'costumercircuit_id', 'id');
	}

	public function biayavendors()
	{
		return $this->hasOne('Biayalastmilevendor', 'circuitidlastmile', 'circuitidlastmile');
	}


	public function customers()
	{
		return $this->belongsTo('Customer', 'customer_id', 'id');
	}

	public function vendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

	public function lastmiles()
	{
		return $this->belongsTo('Lastmile', 'circuitidlastmile', 'circuitidlastmile');
	}

	public function backhauls()
	{
		return $this->belongsTo('Backhaul', 'namabackhaul', 'nama');
	}

}
