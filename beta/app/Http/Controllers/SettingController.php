<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use Input;
use Redirect;

class SettingController extends Controller {

	public function edit(){
		$item = Settings::first();
		return view('admin.edit')->with(['section'=>'setting','item'=>$item]);
	}


	public function update($id){
		$item = Settings::findOrFail($id);
		$item->fill(Input::all());
		$item->save();
		return Redirect('admin/setting/edit')->with(['message'=>'Item Updated']);
	}

}

?>
