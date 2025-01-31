<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['category', 'name', 'client_id', 'course_id', 'description', 'pembelajaran', 'status', 'tanggal_jam'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
