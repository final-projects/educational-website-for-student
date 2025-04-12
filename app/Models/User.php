<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = ['name', 'birth_date', 'email', 'password', 'level'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }

    public function completedLessons()
    {
        return $this->belongsToMany(Lesson::class)->withPivot('completed')->withTimestamps();
    }

public function getAgeAttribute(): ?int
{
    return $this->birth_date ? Carbon::parse($this->birth_date)->age : null;
}

}
