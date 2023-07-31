<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements CanResetPassword
{
    use HasFactory,Notifiable;

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

    // ...

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
    }

    // Helper Methods
}
