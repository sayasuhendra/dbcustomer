<?php

use Laracasts\Presenter\PresentableTrait;

class Costumercircuit extends Eloquent {

	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\CircuitsPresenter';

	protected $guarded = array();

	public static $rules = array(
		'circuitid' => 'required'
	);

	public function getDates()
	{
	    return array('created_at', 'activated_at', 'updated_at');
	}

	public function contacts()
	{
		return $this->morphMany('Customercontact', 'contactable');
	}

	public function customers()
	{
		return $this->belongsTo('Customer');
	}

	public function vendors()
	{
		return $this->belongsTo('Vendor');
	}

	public function adsls()
	{
		return $this->hasOne('Adsl');
	}

	public function biayas()
	{
		return $this->hasOne('Biayacostumercircuit');
	}

	public function perangkats()
	{
		return $this->hasMany('Costumercircuitperangkat');
	}

	public function lastmiles()
	{
		return $this->hasOne('Lastmile');
	}

	public function biayavendors()
	{
		return $this->hasManyThrough('Biayalastmilevendor', 'Lastmile', 'costumercircuit_id', 'circuitidlastmile');
	}

	public function backhauls()
	{
		return $this->belongsTo('Backhaul');
	}
}
