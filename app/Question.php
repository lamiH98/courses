<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'image', 'title', 'title_ar', 'note', 'note_ar', 'right_answer', 'right_answer_ar', 'mark', 'quiz_id',
        'option_1', 'option_2', 'option_3', 'option_4', 'option_1_ar', 'option_2_ar', 'option_3_ar', 'option_4_ar'
    ];

    public function quiz()
    {
        return $this->belongsTo('App\Quiz', 'quiz_id', 'id');
    }
}
