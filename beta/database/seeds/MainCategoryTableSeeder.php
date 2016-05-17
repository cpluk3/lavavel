<?php
use Illuminate\Database\Seeder;
use App\MainCategory as MainCategory;

class MainCategoryTableSeeder extends Seeder{

	public function run(){

		MainCategory::truncate();
		MainCategory::create( [
			'name' => 'Jewellery',
			'priority' => '1',
			'hide_sub' => '0'
		]);
		MainCategory::create( [
			'name' => 'Charms and Phone Pendiant',
			'priority' => '2',
			'hide_sub' => '0'
		]);
		MainCategory::create( [
			'name' => 'Shoe Omaments',
			'priority' => '3',
			'hide_sub' => '0'
		]);
		MainCategory::create( [
			'name' => 'Metal Mirrors',
			'priority' => '4',
			'hide_sub' => '0'
		]);
		MainCategory::create( [
			'name' => 'Hair Accessories',
			'priority' => '5',
			'hide_sub' => '0'
		]);
	}

}

?>
