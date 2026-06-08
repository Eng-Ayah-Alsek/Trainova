<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id', 'userId');
    }
}
