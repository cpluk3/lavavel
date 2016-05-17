<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\SubCategory;
use App\Item;
use App\Feature;
use Illuminate\Http\Request;
use Input;
use Redirect;

class FeatureController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function create(){
		$input = Input::all();
		Feature::create($input);	
		return Redirect('admin/feature/add')->with('message', 'Item created');
	}

	public function delete($id){
		Feature::destroy($id);
		return redirect()->back()->with('message', 'Item deleted');
	}

}
