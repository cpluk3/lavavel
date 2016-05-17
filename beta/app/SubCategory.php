<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {

	//
	protected $fillable = ['name', 'priority', 'parent_id'];
	protected $hidden = ['id', 'created_at', 'updated_at'];



}
