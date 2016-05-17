<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		//disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		
		// $this->call('UserTableSeeder');
		$this->call('SettingTableSeeder');
		$this->call('MainCategoryTableSeeder');
		$this->call('SubCategoryTableSeeder');
		$this->call('ItemTableSeeder');
		$this->call('FeatureTableSeeder');
		$this->call('UserTableSeeder');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
