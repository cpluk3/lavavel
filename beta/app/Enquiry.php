<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model {

	//Enquiry Model
	protected $fillable = ['name', 'sex', 'companyname', 'country', 'tel', 'email', 'message'];
	protected $hidden = ['id', 'created_at', 'updated_at'];


}
