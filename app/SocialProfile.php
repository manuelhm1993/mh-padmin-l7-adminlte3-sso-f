<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    /**
     * Get the user that owns the SocialProfile.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
