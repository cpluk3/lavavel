<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Settings;
use App\Feature;

class PageController extends Controller {

	public function home(){
		$settings = Settings::find(1);
		$features = Feature::orderBy('priority', 'desc')->get();
		return view('home')->with(['settings'=>$settings,'features'=>$features]);
	}

	public function contactus(){
		$settings = Settings::find(1);
		return view('contactus')->with(['settings'=>$settings,'success'=>false]);
	}

	public function aboutus(){
		$settings = Settings::find(1);
		return view('aboutus')->with('settings', $settings);
	}

}
