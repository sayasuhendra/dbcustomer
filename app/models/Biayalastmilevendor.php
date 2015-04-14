<?php

use Laracasts\Presenter\PresentableTrait;

class Biayalastmilevendor extends Eloquent {

	use \Venturecraft\Revisionable\RevisionableTrait;
	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\BiayalastmilevendorPresenter';

	protected $guarded = array();

	public static $rules = array(
	);

	public function lastmiles()
	{
		return $this->belongsTo('Lastmile', 'circuitidlastmile', 'circuitidlastmile');
	}

	public function circuits()
	{
		return $this->belongsTo('Lastmile', 'circuitidlastmile', 'circuitidlastmile');
	}
}
