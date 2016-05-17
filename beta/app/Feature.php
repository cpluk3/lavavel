<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model {

	//Feature Model
	protected $fillable = ['item_id', 'priority'];
	protected $hidden = ['id', 'created_at', 'updated_at'];

}
