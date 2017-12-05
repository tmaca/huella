<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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

    public function deleteUser(Request $request, $id) {
        $user = User::where("id", $id)->firstOrFail();
        $user->delete();
        return redirect(route("admin.home"));
    }

    public function editUser(Request $request) {
        $user = User::where("id", $request->id)->firstOrFail();
        return $request->all();
    }
}
