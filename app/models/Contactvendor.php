<?php

class Contactvendor extends Eloquent {
	
	use \Venturecraft\Revisionable\RevisionableTrait;

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
