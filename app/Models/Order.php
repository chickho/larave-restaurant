<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
	use SoftDeletes;
  
	protected $guarded = ['id'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function table(){
		return $this->belongsTo(Table::class);
	}

	public function user(){
		return $this->hasOne(User::class,'id', 'user_id');
	}
}
