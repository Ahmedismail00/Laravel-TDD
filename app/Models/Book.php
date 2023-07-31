<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','author_id','ISBN'];

    protected $casts = [];

    // Relationships
	public function author()
	{
		return $this->belongsTo('Author');
	}

    // Helper Methods
}
