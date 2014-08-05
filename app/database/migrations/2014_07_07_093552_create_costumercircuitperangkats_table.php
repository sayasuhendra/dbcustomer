<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCostumercircuitperangkatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('costumercircuitperangkats', function(Blueprint $table) {
			$table->increments('id');
			$table->string('namaperangkat')->nullable();
			$table->string('serialnumber')->nullable();
			$table->string('tipe')->nullable();
			$table->string('jenis')->nullable();
			$table->integer('costumercircuit_id')->unique()->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('costumercircuitperangkats');
	}

}
