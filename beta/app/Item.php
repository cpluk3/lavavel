<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	//
	protected $fillable = ['number', 'name', 'description', 'priority', 'category_id', 'status'];
	protected $hidden = ['id', 'created_at', 'updated_at'];

}
