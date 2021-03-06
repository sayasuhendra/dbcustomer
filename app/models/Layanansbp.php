<?php

use Laracasts\Presenter\PresentableTrait;

class Layanansbp extends Eloquent {

	use \Venturecraft\Revisionable\RevisionableTrait;
	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\LayanansbpsPresenter';

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

	public function customers()
	{
		return $this->belongsTo('Customer', 'customer_id', 'id');
	}

}
