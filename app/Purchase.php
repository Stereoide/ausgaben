<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
	use SoftDeletes;
	
	protected $fillable = ['shop_id', 'bought_at', 'price', 'comments'];
	
	protected $dates = ['deleted_at', 'bought_at'];
	
	public function shop() {
		return $this->belongsTo('App\Shop');
	}
	
	public function items() {
		return $this->hasMany('App\Item');
	}
}
