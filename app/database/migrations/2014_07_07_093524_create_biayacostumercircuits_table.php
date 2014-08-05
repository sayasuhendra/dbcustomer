<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBiayacostumercircuitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biayacostumercircuits', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nrc')->nullable();
			$table->string('mrc')->nullable();
			$table->string('biaya')->nullable();
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
		Schema::drop('biayacostumercircuits');
	}

}
