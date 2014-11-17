<?php



class Layanan extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		
		'nama' => 'required'
	);

	public function vendors()
	{
		return $this->belongsTo('Vendor', 'namavendor', 'nama');
	}

}
