<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title', 'description'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class)->withPivot('completed')->withTimestamps();
    }
}
