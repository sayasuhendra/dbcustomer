<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBackhaulswitchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backhaulswitches', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama')->nullable();
			$table->string(' jenis')->nullable();
			$table->integer('jumlahportfo')->unique()->nullable();
			$table->string('jumlahportrj')->nullable();
			$table->string('area')->nullable();
			$table->string('lokasi')->nullable();
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
		Schema::drop('backhaulswitches');
	}

}
