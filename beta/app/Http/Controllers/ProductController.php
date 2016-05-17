<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\SubCategory;
use App\Item;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Validator;
use DB;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function create(Request $request){
		/* Image Handle */
		$image = Input::file('image');
		$file = array('image' => $image);
		$rules = array('image' => 'mimes:jpeg'); //mimes:jpeg,bmp,png and for max size max:10000
		$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
		    // send back to the page with the input data and errors
			return redirect()->back()->withErrors($validator);
		}

		$input = Input::all();
		$item = new Item($input);
		$item->save();

		/* Upload Image */
		$destinationPath = 'pic/item';
		$imageFilename = $item->id . '.' . 'jpg'; //renaming image
		$image->move($destinationPath, $imageFilename);

		/* Go back to original page */
		return Redirect('admin/product/add')->with('message', 'Item created');
	}

	public function update($id){
		$item = Item::findOrFail($id);
		$item->fill(Input::all());
		$item->save();

		/* Image */
		$image = Input::file('image');
		if($image != null){
				$file = array('image' => $image);
				$rules = array('image' => 'mimes:jpeg'); //mimes:jpeg,bmp,png and for max size max:10000
				$validator = Validator::make($file, $rules);
				if ($validator->fails()) {
						// send back to the page with the input data and errors
						return redirect()->back()->withErrors($validator);
				}
				/* Upload Image */
				$destinationPath = 'pic/item';
				$imageFilename = $item->id . '.' . 'jpg'; //renaming image
				$image->move($destinationPath, $imageFilename);
		}

		return Redirect('admin/product/edit?id=' . $id);
	}

	public function delete($id){
			Item::destroy($id);
			return redirect()->back();
	}

	public function edit(){
			$id = Input::get('id');
			$item = Item::findOrFail($id);
			$sub = $item->category_id;
			$subObj = SubCategory::where('id','=', $sub)->first();
			if(empty($subObj)){
					$main = '';
			} else {
					$main = $subObj->parent_id;
			}
			$main_categories = MainCategory::orderBy('priority')->lists('name', 'id');
			$sub_categories = SubCategory::where('parent_id', '=', $main)->orderBy('priority')->lists('name', 'id');
			return view('admin.edit')->with(['section'=>'product','item'=>$item,'main'=>$main,'category_id'=>$sub,'main_categories'=>$main_categories,'sub_categories'=>$sub_categories]);
	}

	public function index(Request $request)
	{
			/* Get Parameters */
			$page = $request->input('page');
			$item = $request->input('item');
			$main_name = urldecode($request->input('main'));
			//convert to main_id
			if($main_name != ''){
				$main = MainCategory::where('name', '=', $main_name)->first()->id;
			} else {
				$main = '';
			}

			$sub_name = urldecode($request->input('sub'));
			if($sub_name != ''){
				$sub = SubCategory::where('name', '=', $sub_name)->first()->id;
			} else {
				$sub = '';
			}

			//convert to sub_id

			$items = array();
			$item_detail = '';
			$item_previous_id = '';
			$item_next_id = '';
			$maincats = MainCategory::orderBy('priority')->get();

			//Check if Exists
			if(!MainCategory::where('id', '=', $main)->exists()){
					//get the first item
					$main = MainCategory::get()->first()->id;
			}
			//Get MainCategory hide_sub attribute
			$hide_sub = MainCategory::where('id', '=', $main)->first()->hide_sub;
			if($hide_sub == 1){
				$subcats = '';
				$sub = '';
				//$items = Item::where('category_id', '=', $sub)->orderBy('priority', 'desc')->paginate(8);
				$items = DB::table('items')->select('items.id', 'number', 'items.name','items.priority','sub_categories.name as subcat','items.status','items.updated_at')->leftjoin('sub_categories','items.category_id', '=', 'sub_categories.id')->where('sub_categories.parent_id', '=', $main)->orderBy('items.priority', 'desc')->paginate(8);
			} else {
				$subcats = SubCategory::where('parent_id', '=', $main)->orderBy('priority')->get();
				if(!SubCategory::where('id', '=', $sub)->exists()){
					$sub = SubCategory::where('parent_id', '=', $main)->orderBy('priority')->get()->first()->id;
				}
				//If item number is not specified, load list of subcat items
				$items = Item::where('category_id', '=', $sub)->orderBy('priority', 'desc')->paginate(8);
			}

			//Get item
			if(!empty($item)){
					$item_detail = Item::where('id', '=', $item)->first();
					
					// Get ID of a User whose autoincremented ID is less than the current
					// user, but because some entries might have been deleted we need to
					// get the max available ID of all entries whose ID is less than
					// current user's
					if($hide_sub == 1){
						$item_previous_id = DB::table('items')->select('items.id', 'number', 'items.name','items.priority','sub_categories.name as subcat','items.status','items.updated_at')->leftjoin('sub_categories','items.category_id', '=', 'sub_categories.id')->where('sub_categories.parent_id', '=', $main)->where('items.id', '<', $item_detail->id)->max('items.id');
						$item_next_id = DB::table('items')->select('items.id', 'number', 'items.name','items.priority','sub_categories.name as subcat','items.status','items.updated_at')->leftjoin('sub_categories','items.category_id', '=', 'sub_categories.id')->where('sub_categories.parent_id', '=', $main)->where('items.id', '>', $item_detail->id)->min('items.id');
					} else {
						$item_previous_id = Item::where('category_id', '=', $item_detail->category_id)->where('id', '<', $item_detail->id)->max('id');
						$item_next_id = Item::where('category_id', '=', $item_detail->category_id)->where('id', '>', $item_detail->id)->min('id');
					}
			}

			//correct the error in xammp
			$items->setPath('product');

			//Get main name and sub name and replace main and sub
			$main = urlencode(MainCategory::where('id', '=', $main)->first()->name);
			if($sub != ''){
				$sub = urlencode(SubCategory::where('id', '=', $sub)->first()->name);
			}

			return view('product')->with(['maincats'=>$maincats,'subcats'=>$subcats,'items'=>$items,'item_detail'=>$item_detail,'page'=>$page,'main'=>$main,'sub'=>$sub, 'item_previous_id'=>$item_previous_id, 'item_next_id'=>$item_next_id]);

	}
}
