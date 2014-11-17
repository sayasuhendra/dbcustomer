<?php

class Contactvendor extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'cp' => 'required'
	);

	public function vendors()
	{
		return $this->belongsTo('Vendor');
	}

	public function lastmiles()
	{
		return $this->hasMany('Lastmile', 'cp', 'am');
	}
}
