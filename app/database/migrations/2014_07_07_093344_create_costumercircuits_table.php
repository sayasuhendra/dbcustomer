<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCostumercircuitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('costumercircuits', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('circuitid')->unique()->nullable();
			$table->string('namasite')->nullable();
			$table->string('alamat')->nullable();
			$table->string('layanan')->nullable();
			$table->string('bandwidth')->nullable();
			$table->integer('circuitidbackhaul')->unique()->nullable();
			$table->integer('circuitidlastmile')->unique()->nullable();
			$table->string('area')->nullable();
			$table->string('status')->nullable();
			$table->integer('customer_id')->unique()->nullable();
			$table->integer('backhaul_id')->unique()->nullable();
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
		Schema::drop('costumercircuits');
	}

}
