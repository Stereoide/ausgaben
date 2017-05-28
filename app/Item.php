<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['purchase_id', 'title', 'amount', 'price', 'comments'];
    
    protected $dates = ['deleted_at'];
    
    public function purchase() {
    	return $this->belongsTo('App\Purchase');
    }
}
