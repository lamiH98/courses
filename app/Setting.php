<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'site_name', 'email','logo', 'facebook_url', 'instagram_url','linkedin_url',
        'twitter_url', 'phone', 'location', 'site_name_ar', 'location_ar'
    ];
}
