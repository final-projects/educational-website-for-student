<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'level_id', 'image'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function materials()
{
    return $this->hasMany(CourseMaterial::class);
}

}
