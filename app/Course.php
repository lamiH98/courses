<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'image', 'title', 'title_ar', 'time', 'description', 'description_ar', 'price', 'price_offer', 'type', 'type_ar', 'stage_id'
    ];

    public function stage()
    {
        return $this->belongsTo('App\Stage', 'stage_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_course', 'course_id', 'user_id');
    }

    public function videos() {
        return $this->hasMany('App\Video', 'course_id', 'id');
    }

    public function quizzes() {
        return $this->hasMany('App\Quiz', 'course_id', 'id');
    }
}
