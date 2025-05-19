<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    protected $fillable = ['course_id', 'type', 'content'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
