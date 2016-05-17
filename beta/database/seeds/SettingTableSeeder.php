<?php
use Illuminate\Database\Seeder;
use App\Settings as Settings;

class SettingTableSeeder extends Seeder{

	public function run(){

		Settings::truncate();
		Settings::create( [
			'companyname' => 'Manufactory Co., Ltd.',
			'introduction' => 'Jewellery is small decorative items worn for personal adornment, such as brooches, rings, necklaces, earrings, and bracelets. Jewellery may be attached to the body or the clothes, and the term is restricted to durable ornaments, excluding flowers for example. For many centuries metal, often combined with gemstones, has been the normal material for jewellery, but other materials such as shells and other plant materials may be used.',
			'address' => 'Test Address, Test Street, Test Building, Hong Kong',
			'phone' => '12345678',
			'facebook' => 'https://www.facebook.com',
			'linkedin' => 'https://www.linkedin.com',
			'skype' => 'hedypang',
			'email' => 'hedypang@gmail.com',
			'copyright' => 'Copyright Manufactory Co., Ltd. All Right Reserved.'
		]);
	}

}

?>
