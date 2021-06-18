<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'image', 'title', 'title_ar', 'description', 'description_ar', 'status', 'time', 'note', 'note_ar','course_id', 'stage_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    public function stage()
    {
        return $this->belongsTo('App\Stage', 'stage_id', 'id');
    }

    public function questions() {
        return $this->hasMany('App\Question', 'quiz_id', 'id');
    }
}
