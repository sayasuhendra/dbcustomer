<?php

class Problem extends Eloquent {
	protected $guarded = array();

	protected $table = "tickets_report";
	
	public static $rules = array(

		'tt' => 'required'
		// 'csc' => 'required',
		// 'area' => 'required',
		// 'customer_id' => 'required',
		// 'start' => 'required',
		// 'finish' => 'required',
		// 'jam' => 'required',
		// 'menit' => 'required',
		// 'channel' => 'required',
		// 'segment' => 'required',
		// 'kategori' => 'required',
		// 'problem' => 'required',
		// 'sub_problem' => 'required',
		// 'rfo' => 'required',
		// 'real_problem' => 'required',
		// 'vendor' => 'required',
		// 'status' => 'required',
		// 'level' => 'required',
		// 'keterangan' => 'required'
	);

	public function getDates()
	{
	    return array('created_at', 'updated_at');
	}

	
}
