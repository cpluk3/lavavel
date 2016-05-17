<?php
use Illuminate\Database\Seeder;
use App\Feature as Feature;

class FeatureTableSeeder extends Seeder{

	public function run(){
		Feature::truncate();

		//Main test
		Feature::create( [
			'item_id' => '1',
			'priority' => '1'
		]);
		Feature::create( [
			'item_id' => '2',
			'priority' => '2'
		]);
		Feature::create( [
			'item_id' => '3',
			'priority' => '3'
		]);
		Feature::create( [
			'item_id' => '4',
			'priority' => '4'
		]);
		Feature::create( [
			'item_id' => '5',
			'priority' => '5'
		]);
	}

}
