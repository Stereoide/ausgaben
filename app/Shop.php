<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['name', 'comments'];
	
	protected $dates = ['deleted_at'];
	
	public function purchases() {
		return $this->hasMany('App\Purchase');
	}
}
