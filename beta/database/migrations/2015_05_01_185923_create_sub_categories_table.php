<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);
			$table->integer('parent_id')->unsigned();
			$table->foreign('parent_id')->references('id')->on('main_categories')->onDelete('cascade');
			$table->integer('priority');
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
		Schema::drop('sub_categories');
	}

}
