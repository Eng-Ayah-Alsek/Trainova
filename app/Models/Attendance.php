<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'userId');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id', 'userId');
    }
}
