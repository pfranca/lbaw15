<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;

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
    protected $redirectTo = '/#themes';

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
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
      return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        //$user = Socialite::driver('google')->stateless()->user();
        //$user = Socialite::driver('google')->user();
        //dd($user);
        $authUser = $this->findOrCreateUser($user, 'google');
        Auth::login($authUser, true);
        return redirect('/');
    }

    public function findOrCreateUser($user, $provider){
        $authUser = User::where('email', $user->email)->first();
        if($authUser){
            return $authUser;
        }
        return User::create([
            'username'=>$user->name,
            'email'=>$user->email,
            'name'=>$user->name,
            'img'=>'user.png',
        ]);
    }


}
?>