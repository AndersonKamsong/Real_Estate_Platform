<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewHistory extends Model
{
    use HasFactory;

    protected $table = 'view_history';
    protected $fillable = ['user_id', 'property_id', 'viewed_at'];
    protected $hidden = [
        'created_at',
    ];
    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
