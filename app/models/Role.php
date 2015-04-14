<?php

class Role extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);
}
