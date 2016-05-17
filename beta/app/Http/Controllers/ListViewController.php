<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MainCategory;
use App\SubCategory;
use App\Item;
use App\Enquiry;
use App\Feature;
use DB;

class ListViewController extends Controller {

	private static $pagination = 5;

	public function viewListingPage(Request $request, $section){
		$main = $request->input('main');
		$sub = $request->input('sub');
		$main_categories = MainCategory::orderBy('priority')->lists('name', 'id');
		if(!isset($main)){
			$temp = MainCategory::orderBy('priority')->first();
			$main = $temp->id;
		}
		$sub_categories = SubCategory::where('parent_id', '=', $main)->orderBy('priority')->lists('name', 'id');
		$showMenu = '2'; //default show menu
		switch($section){
			case 'product':
				if(isset($sub)){
					$items = DB::table('items')->select('items.id', 'number', 'items.name','items.priority','sub_categories.name as subcat','items.status','items.updated_at')->leftjoin('sub_categories','items.category_id', '=', 'sub_categories.id')->where('sub_categories.id', '=', $sub)->orderBy('items.updated_at', 'desc')->paginate(self::$pagination);
				} else {
					//$items = Item::orderBy('updated_at', 'desc')->paginate(self::$pagination);
					$items = DB::table('items')->select('items.id', 'number', 'items.name','items.priority','sub_categories.name as subcat','items.status','items.updated_at')->leftjoin('sub_categories','items.category_id', '=', 'sub_categories.id')->orderBy('items.updated_at', 'desc')->paginate(self::$pagination);
				}
				$header = array('ID'=>'id', 'Item No.'=>'number', 'Item Name'=>'name', 'Priority'=>'priority', 'SubCategory'=>'subcat', 'Status'=>'status', 'Last Update'=>'updated_at');
				break;
			case 'mainCategory':
				$items = MainCategory::orderBy('updated_at', 'desc')->paginate(self::$pagination);
				$header = array('ID'=>'id', 'Name'=>'name', 'Priority'=>'priority', 'Hide SubCategory'=>'hide_sub', 'Last Updated'=>'updated_at'); 
				$showMenu = 0;
				break;
			case 'subCategory':
				if(isset($main)){
					$items = SubCategory::where('parent_id', '=', $main)->orderBy('updated_at', 'desc')->paginate(self::$pagination);
				} else {
					$items = SubCategory::orderBy('updated_at', 'desc')->paginate(self::$pagination);
				}
				$header = array('ID'=>'id', 'Name'=>'name', 'Priority'=>'priority', 'Last Updated'=>'updated_at');
				$showMenu = 1;
				break;
			case 'enquiry':
				$showMenu = 0;
				$items = Enquiry::orderBy('updated_at', 'desc')->paginate(self::$pagination);
				$header = array('ID'=>'id', 'Name'=>'name', 'Sex'=>'sex', 'Company'=>'companyname', 'Country'=>'country','Tel'=>'tel', 'Email'=>'email', 'Message'=>'message','Last Updated'=>'updated_at'); 
				break;
			case 'feature':
				$showMenu = 0;
				$items = DB::table('features')->select('features.id', 'features.item_id', 'features.priority', 'features.updated_at', 'items.number', 'items.name')->leftjoin('items', 'features.item_id', '=', 'items.id')->orderBy('features.updated_at', 'desc')->paginate(self::$pagination);
				$header = array('ID'=>'id', 'Item ID'=>'item_id', 'Item Name'=>'name', 'Item Number'=>'number', 'Priority'=>'priority', 'Last Updated'=>'updated_at'); 
				break;
			default:
				break;
		}
	 
		$items->setPath("view");
		return view('admin.list')->with(['section'=>$section, 'items'=>$items,'main'=>$main, 'sub'=>$sub, 'header'=>$header, 'main_categories'=>$main_categories, 'sub_categories'=>$sub_categories, 'showMenu'=>$showMenu]);
	}

}
