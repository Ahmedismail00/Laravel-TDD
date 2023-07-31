<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name','age','email','phone','password'];

    protected $casts = [];

    // Relationships
	public function orders()
	{
		return $this->hasMany('Order');
	}

	public function emails()
	{
		return $this->hasMany('Email');
	}

    // Helper Methods
}
