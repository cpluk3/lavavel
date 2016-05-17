<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
            $table->increments('id');
			$table->string('companyname', 200);
			$table->text('introduction');
			$table->string('address', 1000);
			$table->string('phone', 50);
            $table->string('skype', 100);
            $table->string('email', 100);
			$table->string('copyright', 200);
			$table->string('facebook', 1000);
			$table->string('linkedin', 1000);
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
