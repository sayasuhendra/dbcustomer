<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('VendorsTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('CostumercircuitsTableSeeder');
		$this->call('CustomercontactsTableSeeder');
		$this->call('AdslsTableSeeder');
		$this->call('BiayacostumercircuitsTableSeeder');
		$this->call('CostumercircuitperangkatsTableSeeder');
		$this->call('LastmilesTableSeeder');
		$this->call('BackhaulsTableSeeder');
		$this->call('BackhaulswitchesTableSeeder');
		$this->call('ContactvendorsTableSeeder');
		$this->call('BiayalastmilevendorsTableSeeder');
		$this->call('BiayabackhaulvendorsTableSeeder');
	}

}
