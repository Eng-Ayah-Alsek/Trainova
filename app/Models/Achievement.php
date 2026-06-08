<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'userId');
    }

    public function views()
    {
        return $this->hasMany(achievement_views::class, 'achievement_id', 'achievement_id');
    }
}
