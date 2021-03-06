<?php

class Adsl extends Eloquent {
	
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	public static $rules = array(
		'username' => 'required'
	);

	public function circuits()
	{
		return $this->belongsTo('Costumercircuit', 'costumercircuit_id', 'id');
	}

	public function lastmiles()
	{
		return $this->belongsTo('Lastmile', 'lastmile_id', 'id');
		
	}
}
