<?php

class Biayalastmilevendor extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nrc' => 'required',
		'mrc' => 'required',
		'circuitidlastmile' => 'required'
	);

	public function lastmiles()
	{
		return $this->belongsTo('Lastmile', 'circuitidlastmile');
	}
}
