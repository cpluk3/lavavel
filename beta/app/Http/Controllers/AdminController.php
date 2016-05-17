<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	public function dashboard(){
		if(\Auth::check()){
			return view('admin.dashboard')->with('user', \Auth::user());
		} else {
			return redirect('auth/login');
		}
	}

}
