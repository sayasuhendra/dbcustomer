<?php

class Backhaulswitch extends Eloquent {
	use \Venturecraft\Revisionable\RevisionableTrait;
	protected $guarded = array();

	public static $rules = array(
		'nama' => 'required',
		'jenis' => 'required',
		'jumlahportfo' => 'required',
		'jumlahportrj' => 'required',
		'area' => 'required',
		'lokasi' => 'required'
	);

	public function backhauls()
	{
		return $this->hasMany('Backhaul', 'switchterkoneksi', 'nama'); // 
	}
}
