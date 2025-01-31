<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // Relationships
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function viewHistory()
    {
        return $this->hasMany(ViewHistory::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
