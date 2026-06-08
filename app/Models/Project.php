<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id', 'category_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'added_by_admin_id', 'userId');
    }
}
