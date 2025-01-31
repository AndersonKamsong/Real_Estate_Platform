<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedSearch extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'criteria',
    ];

    // Relationship: A saved search belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}