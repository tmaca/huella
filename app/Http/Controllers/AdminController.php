<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\ContactoUsuario;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.home', ["users" => $users]);
    }

    public function pruebasAdmin(){
        $mails = ContactoUsuario::all();
        return view('admin.datoscontactoadmin', ["mails" => $mails]);
    }

    public function deleteUser(Request $request, $id) {
        $user = User::where("id", $id)->firstOrFail();
        $user->delete();
        return redirect(route("admin.home"));
    }

    public function editUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'nif' => 'required|alpha_num|size:9',
            'telephone' => 'required|integer|min:100000000|max:999999999',
            'year' => 'required|integer|min:1000|max:2100',
            'email' => 'required|string|email|max:255',
            'verified' => 'required', Rule::in("0", "1"),
        ]);

        if ($validator->fails()) {
            $request->session()->flash("editFailed", true);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where("id", $request->id)->firstOrFail();
        $user->name = $request->input("name");
        $user->nif = $request->input("nif");
        $user->telephone = $request->input("telephone");
        $user->year = $request->input("year");
        $user->email = $request->input("email");
        $user->verified = $request->input("verified");
        $user->save();
        return redirect(route("admin.home"));
    }
}
