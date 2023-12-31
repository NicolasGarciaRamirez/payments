<?php

namespace App\Models;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = ['name','description','price','image','active'];

	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

	public function plans()
	{
		return $this->belongsToMany(Plan::class);
	}
}
