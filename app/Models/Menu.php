<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
	use HasFactory;
	use SoftDeletes;
  
	protected $guarded = ['id'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function orderDetail(){
		return $this->hasMany(OrderDetail::class);
	}
}
