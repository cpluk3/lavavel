<?php
use Illuminate\Database\Seeder;
use App\Item as Item;

class ItemTableSeeder extends Seeder{

	public function run(){
		Item::truncate();

		//Main test
		Item::create( [
			'number' => 'JEW01',
			'name' => 'Ruby Necklace',
			'description' => 'Ruby is a pink to blood-red colored gemstone, a variety of the mineral corundum (aluminium oxide). The red color is caused mainly by the presence of the element chromium.',
			'priority' => '9',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW02',
			'name' => 'Emerald Necklace',
			'description' => 'Emerald is a gemstone and a variety of the mineral beryl (Be3Al2(SiO3)6) colored green by trace amounts of chromium and sometimes vanadium.[2] Beryl has a hardness of 7.5–8 on the Mohs scale.[2] Most emeralds are highly included, so their toughness (resistance to breakage) is classified as generally poor.',
			'priority' => '8',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW03',
			'name' => 'Sapphire',
			'description' => 'Sapphire (Greek: σάπφειρος; sappheiros, blue stone,[2] which probably referred instead at the time to lapis lazuli) is a typically blue gemstone variety of the mineral corundum, an aluminium oxide (α-Al2O3). Trace amounts of elements such as iron, titanium, chromium, copper, or magnesium can give corundum respectively blue, yellow, purple, orange, or green color. Chromium impurities in corundum yield pink or red tint, the latter being called ruby.',
			'priority' => '7',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW04',
			'name' => 'Topaz',
			'description' => 'Pure topaz is colorless and transparent but is usually tinted by impurities; typical topaz is wine red, yellow, pale gray, reddish-orange, or blue brown. It can also be made white, pale green, blue, gold, pink (rare), reddish-yellow or opaque to transparent/translucent.',
			'priority' => '6',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW05',
			'name' => 'Amethyst',
			'description' => 'Amethyst is a violet variety of quartz often used in jewelry. The name comes from the Ancient Greek, a reference to the belief that the stone protected its owner from drunkenness.',
			'priority' => '5',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW06',
			'name' => 'Amethyst II',
			'description' => 'Amethyst is a violet variety of quartz often used in jewelry. The name comes from the Ancient Greek, a reference to the belief that the stone protected its owner from drunkenness.',
			'priority' => '4',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW07',
			'name' => 'Amethyst III',
			'description' => 'Amethyst is a violet variety of quartz often used in jewelry. The name comes from the Ancient Greek, a reference to the belief that the stone protected its owner from drunkenness.',
			'priority' => '3',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW08',
			'name' => 'Amethyst IV',
			'description' => 'Amethyst is a violet variety of quartz often used in jewelry. The name comes from the Ancient Greek, a reference to the belief that the stone protected its owner from drunkenness.',
			'priority' => '2',
			'category_id' => '1',
			'status' => ''
		]);
		Item::create( [
			'number' => 'JEW09',
			'name' => 'Amethyst V',
			'description' => 'Amethyst is a violet variety of quartz often used in jewelry. The name comes from the Ancient Greek, a reference to the belief that the stone protected its owner from drunkenness.',
			'priority' => '1',
			'category_id' => '1',
			'status' => ''
		]);

		//Another Category Test
		Item::create([
			'number' => 'CHM01',
			'name' => 'Charms I',
			'description' => 'A charm bracelet is an item of jewellery worn around the wrist. It carries personal "charms": decorative pendants or trinkets which signify important things in the wearers life.',
			'priority' => '1',
			'category_id' => '2',
			'status' => ''
		]);

	}
}
