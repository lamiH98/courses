<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'user_id', 'course_id', 'rating', 'comment'
    ];
}
