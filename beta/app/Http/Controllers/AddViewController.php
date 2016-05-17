<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\SubCategory;
use App\Item;
use Illuminate\Http\Request;

class AddViewController extends Controller {

	public function add(Request $request, $section){
		$main_categories = MainCategory::orderBy('priority')->lists('name', 'id');
		$mainObj = MainCategory::orderBy('priority')->first();
		$main = $mainObj->id;
		$sub_categories = SubCategory::where('parent_id', '=', $main)->orderBy('priority')->lists('name', 'id');
		if(!empty($sub_categories)){
			$subObj = SubCategory::orderBy('priority')->first();
			$sub = $subObj->id;
		} else {
			$sub = '';
		}
		if($section == 'feature'){
			$items = Item::where('category_id', '=', $sub)->orderBy('updated_at')->lists('name', 'id');
		} else {
			$items = '';
		}

		switch($section){
			case 'product':
					break;
			default:
					break;
		}
		return view('admin.add')->with(['section'=>$section,'main_categories'=>$main_categories,'sub_categories'=>$sub_categories,'main'=>$main,'items'=>$items]);
	}

}

?>
