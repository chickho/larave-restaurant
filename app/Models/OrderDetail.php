<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
	use SoftDeletes;
  
	protected $guarded = ['id'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function menu(){
		return $this->belongsTo(Menu::class);
	}

	public function order(){
		return $this->belongsTo(Order::class);
	}

	
}
