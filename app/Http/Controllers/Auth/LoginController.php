<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Socialite;
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
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request,$provider)
    {
        if($provider == 'facebook'){
        $userSocialite = Socialite::driver($provider)->user();
        $user = new User;
        $authUser = $user->where('provider_id',$userSocialite->id)->first();
        if(!$authUser){
            $authUser =  $user->create([
                'name'     => $userSocialite->name,
                'email'    => $userSocialite->email,
                'password' => bcrypt(123456),
                'provider' => $provider,
                'provider_id' => $userSocialite->id
            ]);
        }
        
        Auth::login($authUser,true);
        // $user->token;
        return redirect($this->redirectTo);
    }
    else{
        $user = Socialite::driver('google')->user();
       echo $user->getName();
    }

    }
    public function doFindCreate($user,$provider){
      
        /*
        Check if the user is already in the database. if not,add user.
        */
    }
}
