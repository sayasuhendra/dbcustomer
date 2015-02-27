<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProblemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('problems', function(Blueprint $table) {
			$table->increments('id');
			$table->string('tt')->unique()->nullable();
			$table->string('csc')->nullable();
			$table->string('area')->nullable();
			$table->string('customer_id')->nullable();
			$table->datetime('start')->nullable();
			$table->datetime('finish')->nullable();
			$table->string('jam')->unique()->nullable();
			$table->string('menit')->unique()->nullable();
			$table->string('channel')->nullable();
			$table->string('segment')->nullable();
			$table->string('kategori')->nullable();
			$table->string('problem')->nullable();
			$table->string('sub_problem')->nullable();
			$table->text('rfo')->nullable();
			$table->text('real_problem')->nullable();
			$table->string('vendor')->nullable();
			$table->string('status')->nullable();
			$table->string('level')->nullable();
			$table->text('keterangan')->nullable();
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
		Schema::drop('problems');
	}

}
