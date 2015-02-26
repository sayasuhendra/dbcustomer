<?php

use Laracasts\Presenter\PresentableTrait;

class Customer extends Eloquent {

	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\CostumersPresenter';

	protected $guarded = array();

	public static $rules = array(
	);

	public function getDates()
	{
	    return array('created_at', 'updated_at');
	}

	public function customercontacts()
	{
		return $this->morphMany('Customercontact', 'contactable');
	}

	public function circuits()
	{
		return $this->hasMany('Costumercircuit', 'customer_id', 'id');
	}

	public function layanansbps()
	{
		return $this->hasMany('Layanansbp', 'customer_id', 'id');
	}
}
