<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBackhaulsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backhauls', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('vendor_id')->unique()->nullable();
			$table->integer('circuitidbackhaul')->unique()->nullable();
			$table->string('lokasixconnect')->nullable();
			$table->string('switchterkoneksi')->nullable();
			$table->integer('portterkoneksi')->unique()->nullable();
			$table->string('bandwidth')->nullable();
			$table->integer('backhaulswitch_id')->unique()->nullable();
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
		Schema::drop('backhauls');
	}

}
