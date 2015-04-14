<?php

class Customercontact extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();
	
	public static $rules = array(
		'cp' => 'required',
		'bagian' => 'required',
		'telepon' => 'required',
		'email' => 'required'
	);

	public function contactable(){
		 return $this->morphTo();
		}
}
