<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table = 'Ratings';
    protected $primaryKey = 'rating_id';
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'userId');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id', 'userId');
    }
}
