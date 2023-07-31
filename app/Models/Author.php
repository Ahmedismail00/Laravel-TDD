<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name','age','email','phone','password'];

    protected $casts = [];

    // Relationships
	public function books()
	{
		return $this->hasMany('Book');
	}

    // Helper Methods
}
