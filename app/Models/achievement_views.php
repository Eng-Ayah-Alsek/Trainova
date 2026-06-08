<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class achievement_views extends Model
{
    protected $table = 'achievement_views';


    public function achievement()
    {
        return $this->belongsTo(Achievement::class, 'achievement_id', 'achievement_id');
    }


    public function financier()
    {
        return $this->belongsTo(User::class, 'financier_id', 'userId');
    }
}
