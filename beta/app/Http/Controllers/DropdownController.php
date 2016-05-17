<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\SubCategory;
use App\Item;
use Illuminate\Http\Request;

class DropdownController extends Controller {

	public function getItemList($sub){
		$jsonArray = array();
		$items = Item::where('category_id', '=', $sub)->orderBy('priority')->get();
		foreach($items as $item){
			$jsonArray[$item->id] = $item->name;
		}
		return response()->json(json_encode($jsonArray));
	}

	public function getSubCategories($main){
		$jsonArray = array();
		$items = SubCategory::where('parent_id', '=', $main)->orderBy('priority')->get();
		foreach($items as $item){
			$jsonArray[$item->id] = $item->name;
		}
		return response()->json(json_encode($jsonArray));
	}

	public function getMainCategories(){
		$jsonArray = array();
		$items = MainCategory::orderBy('priority')->get();
		foreach($items as $item){
			$jsonArray[$item->id] = $item->name;
		}
		return response()->json(json_encode($jsonArray));
	}

}
