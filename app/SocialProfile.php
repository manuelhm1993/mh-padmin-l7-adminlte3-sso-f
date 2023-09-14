<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'social_id', 'social_name', 'social_avatar',
    ];

    /**
     * Get the user that owns the SocialProfile.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
