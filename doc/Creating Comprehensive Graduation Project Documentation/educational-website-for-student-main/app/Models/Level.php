<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'description',
        'min_age',
        'max_age',
        'order',
    ];

    // Relationship: a level has many students (or users)
    public function students()
    {
        return $this->hasMany(User::class);
    }

    // Scope to order levels by 'order' field
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Cast fields to native types
    protected $casts = [
        'min_age' => 'integer',
        'max_age' => 'integer',
        'order'   => 'integer',
    ];
}
