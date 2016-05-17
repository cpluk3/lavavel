<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
	//
	protected $fillable = ['companyname', 'introduction', 'address', 'phone', 'skype', 'email', 'copyright', 'facebook', 'linkedin'];
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

}
