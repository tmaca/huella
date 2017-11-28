<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|min:5|max:255',
            'nif' => 'required|alpha_num|size:9',
            'telephone' => 'required|integer|min:100000000|max:999999999',
            'year' => 'required|integer|min:1000|max:2100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'terms' => 'accepted'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'nif' => $data['nif'],
            'telephone' => $data['telephone'],
            'year' => $data['year'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            "email_code" => str_random(75),
            "verified" => false,
        ]);

        $user->sendVerifyEmail();

        return $user;
    }

    public function register(Request $request) {
        $validator = $this::validator($request->all());

        if ($validator->fails()) {
            return redirect(route("register"))->withErrors($validator)->withInput();

        } else {
            $this::create($request->all());
        }

        return view("auth.register", ["postRegister" => true, "emailAddress" => $request->email]);
    }

    public function verifyEmail(Request $request, $token) {
        User::where("email_code", $token)->firstOrFail()->verify();

        return redirect(route("login"));
    }
}
