<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Enquiry;
use App\Settings;

class EnquiryController extends Controller {
	
	private static $pagination = 10;

	public function delete($id){
		Enquiry::destroy($id);
		return redirect()->back();
	}

	public function view(Request $request){
			$items = Enquiry::orderBy('updated_at', 'desc')->paginate(self::$pagination);
			$items->setPath('enquiryView');
			$section = 'Enquiry Listing';
			$header = array('ID'=>'id', 'Name'=>'name', 'Sex'=>'sex', 'Company'=>'companyname', 'Country'=>'country','Tel'=>'tel', 'Email'=>'email', 'Message'=>'message','Last Updated'=>'updated_at'); 
			return view('admin.list')->with(['section'=>$section, 'items'=>$items, 'header'=>$header]);
	}

	public function index(Request $request){
		$enquiry = new Enquiry;
		$enquiry->name = $request->input('name');
		$enquiry->sex = $request->input('sex');
		$enquiry->companyname = $request->input('companyname');
		$enquiry->country = $request->input('country');
		$enquiry->tel = $request->input('tel');
		$enquiry->email = $request->input('email');
		$enquiry->message = $request->input('message');
		$enquiry->save();	
		$settings = Settings::find(1);
		return view('contactus')->with(['success'=>true,'settings'=>$settings]);
	}

}
