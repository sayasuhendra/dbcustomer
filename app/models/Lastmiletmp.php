<?php

class Lastmiletmp extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'circuitidlastmile' => 'required'
	);
}
