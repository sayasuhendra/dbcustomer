<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLastmilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lastmiles', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('circuitidlastmile')->unique()->nullable();
			$table->string('vlanid')->nullable();
			$table->string('vlanname')->nullable();
			$table->string('ipaddressptp')->nullable();
			$table->string('blockippubliccustomer')->nullable();
			$table->integer('backhaul_id')->unique()->nullable();
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
		Schema::drop('lastmiles');
	}

}
