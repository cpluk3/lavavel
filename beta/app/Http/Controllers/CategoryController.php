<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\SubCategory;
use App\Item;
use Illuminate\Http\Request;
use Input;
use Redirect;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function updateMainCategory($id){
		$item = MainCategory::findOrFail($id);
		$item->fill(Input::all());
		$item->save();
		return Redirect('admin/mainCategory/edit?id='. $id);
	}

	public function updateSubCategory($id){
		$item = SubCategory::findOrFail($id);
		$item->fill(Input::all());
		$item->save();
		return Redirect('admin/subCategory/edit?id='. $id);
	}

	public function editMainCategory(){
		$id = Input::get('id');	
		$item = MainCategory::findOrFail($id);
		return view('admin.edit')->with(['section'=>'mainCategory','item'=>$item]);
	}

	public function editSubCategory(){
		$id = Input::get('id');
		$item = SubCategory::findorFail($id);
		$main = $item->parent_id;
		$main_categories = MainCategory::orderBy('priority')->lists('name', 'id');
		return view('admin.edit')->with(['section'=>'subCategory','item'=>$item, 'main_categories'=>$main_categories, 'main'=>$main]);
	}

	public function deleteMainCategory($id){
		MainCategory::destroy($id);
		return redirect()->back();
	}

	public function deleteSubCategory($id){
		SubCategory::destroy($id);
		return redirect()->back();
	}

	public function createMainCategory(){
		$input = Input::all();
		MainCategory::create($input);
		return Redirect('admin/mainCategory/add')->with(['message'=>'Item created']);
	}

	public function createSubCategory(){
		$input = Input::all();
		SubCategory::create($input);
		return Redirect('admin/subCategory/add')->with(['message'=>'Item created']);
	}

}
