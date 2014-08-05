<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomercontactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customercontacts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('cp')->nullable();
			$table->string('bagian')->nullable();
			$table->string('telepon')->nullable();
			$table->string('email')->nullable();
			$table->integer('contactable_id')->nullable();
			$table->string('contactable_type')->nullable();
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
		Schema::drop('customercontacts');
	}

}
