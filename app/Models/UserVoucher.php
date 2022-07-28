<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVoucher extends Model
{
    use HasFactory;
	use SoftDeletes;

	protected $guarded = ['id'];

	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function voucher(){
		return $this->belongsTo(Voucher::class);
	}
}
