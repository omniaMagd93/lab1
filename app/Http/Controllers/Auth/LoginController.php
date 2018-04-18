<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;

use App\UserSocial;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

      
        $UserId = $user->getId();
        $UsernickName = $user->getNickname();;
        $UserEmail = $user->getEmail();

        $findId = UserSocial::where('social_id',$user->getId())->exists();

        login($user, true);

        if($findId)
        {
           
       return redirect(route('posts.index'));
        }
           

else
{
            UserSocial::create([
            'social_id' => $user->getId(),
            'social_name' => $UsernickName,
            'social_email' => $UserEmail,
            'social_flag' => "github",


            
        ]);
 
       return redirect(route('posts.index'));
    
}
}
}
