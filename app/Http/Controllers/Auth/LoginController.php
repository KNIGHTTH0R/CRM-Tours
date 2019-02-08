<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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


   // protected $redirectTo = '/home';


    public function authenticated()
    {
        if(Auth::check() && Auth::user()->is_admin)
        {
            return redirect()->route('agencies.index');
        }
        if(Auth::check() && Auth::user()->is_agent)
        {
            return redirect()->route('agent.tours');
        }

        return redirect()->route('home');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
