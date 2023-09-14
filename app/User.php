<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the SocialProfiles for the user.
     */
    public function socialProfiles()
    {
        return $this->hasMany('App\SocialProfile');
    }

    // Método para devolver la imágen de perfil de usuario
    public function adminlte_image() {
        $social_profile = $this->socialProfiles()->first();

        return ($social_profile) ? $social_profile->social_avatar : 'https://picsum.photos/300/300';
    }

    // Método para devolver el rol del usuario
    public function adminlte_desc() {
        return "Administrador";
    }

    // Método para devolver la vista del perfil del usuario
    public function adminlte_profile_url() {
        return "profile/username";
    }
}
