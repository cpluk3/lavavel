<?php
use Illuminate\Database\Seeder;
use App\SubCategory as SubCategory;

class SubCategoryTableSeeder extends Seeder{

	public function run(){

		SubCategory::truncate();

		/* Create Category 1 subcats */
		SubCategory::create( [
			'name' => 'Necklances', 'parent_id' => '1', 'priority' => '1'
		]);
		SubCategory::create( [
			'name' => 'Rings', 'parent_id' => '1', 'priority' => '2'
		]);
		SubCategory::create( [
			'name' => 'Bangles and Bracelets', 'parent_id' => '1', 'priority' => '3'
		]);
		SubCategory::create( [
			'name' => 'Earrings', 'parent_id' => '1', 'priority' => '4'
		]);
		
		/* Create Category 2 subcats */
		SubCategory::create( [
			'name' => 'Apple', 'parent_id' => '2', 'priority' => '1'
		]);
		SubCategory::create( [
			'name' => 'Orange', 'parent_id' => '2', 'priority' => '2'
		]);
		SubCategory::create( [
			'name' => 'Banana', 'parent_id' => '2', 'priority' => '3'
		]);

		/* Create Category 3 subcats */
		SubCategory::create( [
			'name' => 'Star', 'parent_id' => '3', 'priority' => '1'
		]);
		SubCategory::create( [
			'name' => 'Sun', 'parent_id' => '3', 'priority' => '2'
		]);
		SubCategory::create( [
			'name' => 'Moon', 'parent_id' => '3', 'priority' => '3'
		]);
		SubCategory::create( [
			'name' => 'Earth', 'parent_id' => '3', 'priority' => '4'
		]);

		/* Create Category 4 subcats */
		SubCategory::create( [
			'name' => 'Orange', 'parent_id' => '4', 'priority' => '1'
		]);
		SubCategory::create( [
			'name' => 'Blue', 'parent_id' => '4', 'priority' => '2'
		]);
		SubCategory::create( [
			'name' => 'Red', 'parent_id' => '4', 'priority' => '3'
		]);
		SubCategory::create( [
			'name' => 'Green', 'parent_id' => '4', 'priority' => '4'
		]);
		SubCategory::create( [
			'name' => 'Purple', 'parent_id' => '4', 'priority' => '5'
		]);

		/* Create Category 5 subcats */
		SubCategory::create( [
			'name' => 'Korea', 'parent_id' => '5', 'priority' => '1'
		]);
		SubCategory::create( [
			'name' => 'China', 'parent_id' => '5', 'priority' => '2'
		]);
		SubCategory::create( [
			'name' => 'Japan', 'parent_id' => '5', 'priority' => '3'
		]);
	}
}

?>

		/* Create Category 5 subcats */
		SubCategory::create( [
			'name' => 'Korea', 'parent_id' => '5', 'priority' => '1'
		]);
		SubCategory::create( [
			'name' => 'China', 'parent_id' => '5', 'priority' => '2'
		]);
		SubCategory::create( [
			'name' => 'Japan', 'parent_id' => '5', 'priority' => '3'
		]);

	}

}

?>
