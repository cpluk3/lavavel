<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model {

	//
	protected $fillable = ['name', 'priority','hide_sub'];
	protected $hidden = ['id', 'created_at', 'updated_at'];


}
