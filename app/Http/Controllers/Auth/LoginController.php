<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        $this->middleware('auth')->only('logout');
    }

    protected function redirectTo()
    {
        // Check user role and redirect accordingly
        if (auth()->check()) {
            $user = auth()->user();
            
            switch ($user->role) {
                case 'admin':
                    return '/admin/dashboard';
                case 'akademik':
                    return '/akademik';
                case 'bk':
                    return '/bk/dashboard';
                case 'guru':
                    return '/guru/dashboard';
                case 'siswa':
                    return '/siswa/dashboard';
                default:
                    return '/home';
            }
        }
        
        return $this->redirectTo;
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect($this->redirectTo());
    }
}
