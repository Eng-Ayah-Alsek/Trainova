<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function groups()
    {
        return $this->hasMany(Group::class, 'mentor_id', 'userId');
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')
            ->withPivot('enroll_date', 'status')
            ->withTimestamps();
    }

    public function attendanceRecords()
    {
        return $this->hasMany(Attendance::class, 'student_id', 'userId');
    }

    public function submittedAttendances()
    {
        return $this->hasMany(Attendance::class, 'mentor_id', 'userId');
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'student_id', 'userId');
    }

    public function achievementViews()
    {
        return $this->hasMany(achievement_views::class, 'financier_id', 'userId');
    }

    public function addedProjects()
    {
        return $this->hasMany(project::class, 'added_by_admin_id', 'userId');
    }


    public function sentMessages()
    {
        return $this->hasMany(message::class, 'sender_id', 'userId');
    }

    public function receivedMessages()
    {
        return $this->hasMany(message::class, 'recipient_id', 'userId');
    }

    public function announcements()
    {
        return $this->hasMany(announcement::class, 'admin_id', 'userId');
    }

    public function ratingsReceived()
    {
        return $this->hasMany(Ratings::class, 'student_id', 'userId');
    }


    public function ratingsGiven()
    {
        return $this->hasMany(Ratings::class, 'mentor_id', 'userId');
    }
}
