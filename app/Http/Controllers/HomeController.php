<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailUser;
use App\Models\ContactoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailAdmin;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('datoscontacto');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }
    public function datoscontacto(Request $request)
    {
        $validator = $this::validator($request->all());

        if ($validator->fails()) {
            $request->session()->flash("isContactValid", false);
            return redirect(route("landing"))->withErrors($validator)->withInput();

        }


        $email=$request->email;
        $subject=$request->subject;
        $message=$request->message;

        $datoscontacto = ContactoUsuario::create([

            'email' => $email,
            'subject' => $subject,
            'message' => $message,

        ]);

        Mail::to($email)->send(new ContactMailUser());

        Mail::to(config("mail.adminAddress"))->send(new ContactMailAdmin());

        return view('mails.respuestacontacto');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => 'required|string|email|max:255',
            'subject' => 'nullable',
            'message' => 'required',

        ]);
    }
}
