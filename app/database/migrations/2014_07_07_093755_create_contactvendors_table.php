<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactvendorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contactvendors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama')->nullable();
			$table->string('bagian')->nullable();
			$table->string('telepon')->nullable();
			$table->string('email')->nullable();
			$table->integer('vendor_id')->unique()->nullable();
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
		Schema::drop('contactvendors');
	}

}
