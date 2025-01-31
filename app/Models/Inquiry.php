<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'name',
        'email',
        'message',
    ];

    // Relationship: An inquiry belongs to a user (buyer)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: An inquiry belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}