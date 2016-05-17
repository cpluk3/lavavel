<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Validator;


class ImageController extends Controller {

	public function edit(){
		return view('admin.upload')->with(['section'=>'Upload']);
	}

	public function update(){
		/* Image Handle */
		$image = Input::file('image');
		$file = array('image' => $image);
		$rules = array('image' => 'mimes:png'); //mimes:jpeg,bmp,png and for max size max:10000
		$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
		    // send back to the page with the input data and errors
			return redirect()->back()->withErrors($validator);
		}
		/* Upload Image */
		$destinationPath = 'pic/';
		$imageFilename = 'banner.png'; //renaming image
		$image->move($destinationPath, $imageFilename);
		return view('admin.upload')->with(['section'=>'Upload']);
	}

}

