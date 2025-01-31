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
    public function savedSearches()
    {
        return $this->hasMany(SavedSearch::class);
    }
    public function inquiries()
    {
        return $this->hasManyThrough(
            Inquiry::class, // Target model
            Property::class, // Intermediate model
            'user_id', // Foreign key on the intermediate model (properties table)
            'property_id', // Foreign key on the target model (inquiries table)
            'id', // Local key on the user model
            'id' // Local key on the intermediate model (properties table)
        );
    }
}

