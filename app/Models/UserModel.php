<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class UserModel extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'avatar', 'google_token', 'google_refresh_token',
    ];

    public $timestamps = false;
}
