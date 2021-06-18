<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'image', 'stage', 'stage_ar'
    ];

    public function courses() {
        return $this->hasMany('App\Course', 'stage_id', 'id');
    }

    public function users() {
        return $this->hasMany('App\User', 'stage_id', 'id');
    }
}
