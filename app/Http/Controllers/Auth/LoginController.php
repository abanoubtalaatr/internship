<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
   
   // protected $redirectTo = "/profile/";

    protected function redirectTo()
    {
        $user = new User;
        $user = $user::find(Auth::id())->get()->first();
        $fullname = $user->first_name . '.'.$user->last_name . '.'.$user->id;
         
        return "/tasks";
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {  
        $this->middleware('guest')->except('logout');
    }//consturctor

    
}
