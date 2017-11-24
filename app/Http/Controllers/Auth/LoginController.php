<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'remember' => 'nullable'
        ]);
    }

    public function login(Request $request) {
        // TODO validar formulario y mostrar errores
        $validator = $this::validator($request->all());

        if ($validator->fails()) {
            return redirect(route("login"))->withErrors($validator)->withInput();
        }

        if (isset($request->remember)) {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt(["email" => $request->email, "password" => $request->password], $remember)) {

            $user = Auth::user();

            // user has verified email
            if (!empty($user->email_code) && !$user->verified) {
                Auth::logout();

                return view("auth.login", ["emailVerified" => false]);
            }

            return redirect()->intended($this::redirectPath());

        } else {
            return redirect(route("login"))->withErrors($validator)->withInput();
        }

    }
}
