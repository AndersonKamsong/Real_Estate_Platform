<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'type',
        'bedrooms',
        'bathrooms',
        'sqft',
        'location',
        'user_id',
        'status',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'property_category');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
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
