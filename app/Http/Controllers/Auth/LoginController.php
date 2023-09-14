<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Providers\RouteServiceProvider;
use App\SocialProfile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Social authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from Social.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        $userSocialite = Socialite::driver($driver)->user();
        // $userSocialite = Socialite::driver($driver)->stateless()->user();

        $user           = User::where('email', $userSocialite->email)->first();
        $social_profile = SocialProfile::where('social_id', $userSocialite->id)
                                       ->where('social_name', $driver)
                                       ->first();

        // Si el usuario no existe lo creamos
        if(!$user) {
            $user = User::create([
                'email' => $userSocialite->email,
                'name'  => $userSocialite->name
            ]);
        }

        // Si el perfil no existe lo creamos
        if(!$social_profile) {
            $user->socialProfiles()->create([
                'social_id'     => $userSocialite->id,
                'social_name'   => $driver,
                'social_avatar' => $userSocialite->avatar,
            ]);
        }

        auth()->login($user);

        return redirect()->route('home');
    }
}
