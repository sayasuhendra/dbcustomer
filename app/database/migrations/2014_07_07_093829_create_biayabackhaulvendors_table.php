<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBiayabackhaulvendorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biayabackhaulvendors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nrc')->nullable();
			$table->string('mrc')->nullable();
			$table->integer('circuitidbackhaul')->unique()->nullable();
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
		Schema::drop('biayabackhaulvendors');
	}

}
