<?php

class Lastmiletmp extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	public static $rules = array(
		'circuitidlastmile' => 'required'
	);
}
