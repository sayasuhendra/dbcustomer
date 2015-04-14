<?php

use Laracasts\Presenter\PresentableTrait;

class Vendor extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\VendorsPresenter';

	public static $rules = array(
		'nama' => 'required',
		'alamat' => 'required'
	);

	public function backhauls()
	{
		return $this->hasMany('Backhaul', 'namavendor', 'nama');
	}

	public function lastmiles()
	{
		return $this->hasMany('Lastmile', 'namavendor', 'nama');
	}

	public function contactvendors()
	{
		return $this->hasMany('Contactvendor');
	}

	public function costumercircuits()
	{
		return $this->hasMany('Costumercircuit', 'namavendor', 'nama');
	}

	public function layanans()
	{
		return $this->hasMany('Layanan', 'namavendor', 'nama');
	}
}
