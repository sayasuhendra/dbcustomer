<?php

use Laracasts\Presenter\PresentableTrait;

class Layanan extends Eloquent {

	use \Venturecraft\Revisionable\RevisionableTrait;
	use PresentableTrait;

	protected $presenter = 'Acme\Presenters\LayananPresenter';

	protected $guarded = array();

	public static $rules = array(
		
		'nama' => 'required'
	);

	public function vendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

}
