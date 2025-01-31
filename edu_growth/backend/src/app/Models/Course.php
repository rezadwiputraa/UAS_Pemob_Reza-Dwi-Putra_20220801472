<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['user_id', 'name_course', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}