<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'image', 'url','title', 'title_ar', 'time', 'description', 'description_ar', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }
}
