<?php

use Laracasts\Presenter\PresentableTrait;

class Backhaul extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\BackhaulsPresenter';

	public static $rules = array();

	public function getDates()
	{
	    return array('created_at', 'updated_at');
	}

	public function vendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

	public function circuits()
	{
		return $this->hasMany('Costumercircuit', 'namabackhaul', 'nama');
	}

	public function biayas()
	{
		return $this->hasOne('Biayabackhaulvendor', 'circuitidbackhaul', 'circuitidbackhaul');
	}

	public function switches()
	{
		return $this->belongsTo('Backhaulswitch', 'switchterkoneksi', 'nama');
	}

	public function lastmiles()
	{
		return $this->hasMany('Backhaul', 'namabackhaul', 'nama');
	}

}
