<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function username(){
        return 'usuario';
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['usuario' => $request->usuario, 'password' => $request->password, 'estado' => 'Activo']))
        {
            // Updated this line
            return $this->sendLoginResponse($request);

            // OR this one
            // return $this->authenticated($request, auth()->user());
        }
        else
        {
            return $this->sendFailedLoginResponse($request, 'auth.failed_status');
        }
    }
}
