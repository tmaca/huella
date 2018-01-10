<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailUser;
use App\Models\ContactoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Building;
use App\Mail\ContactMailAdmin;
use App\Models\Study;
use App\Models\User;

use App\Rules\ValidateDni;

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

    /**
     * Contact
     */
     public function datoscontacto(Request $request)
     {
         $validator = $this::contactValidator($request->all());

         if ($validator->fails())
         {
             $request->session()->flash("isContactValid", false);

             return redirect(route("landing") . "#contacto")->withErrors($validator)->withInput();
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

     protected function contactValidator(array $data)
     {
         return Validator::make($data, [
             'email' => 'required|string|email|max:255',
             'subject' => 'nullable',
             'message' => 'required',
         ]);
     }

     /**
      * Buildings
      */
      public function building(Request $request)
      {
          // hacer query de los edificios
          $buildings = Building::where("user_id", Auth::id())->get();

          // devolver vista pasando los edificios
          return view('building.building', ["buildings" => $buildings]);
      }

      protected function buildingValidator(array $data)
      {
          return Validator::make($data, [
              'name' => 'required|string|max:35',
          ]);
      }

      public function addBuilding(Request $request)
      {
          $validator = $this::buildingValidator($request->all());

          if ($validator->fails())
          {
              return redirect(route("building"))->withErrors($validator)->withInput();
          }

          $building = Building::create([
              'name' => $request -> name,
              'user_id' => Auth::id()
          ]);

           return redirect(route("building"));
      }

      public function editBuilding(Request $request)
      {
          $validator = $this::buildingValidator($request->all());

          if ($validator->fails())
          {
              return redirect(route("building"))->withErrors($validator)->withInput();
          }

          $building = Building::where("id", $request->id)->firstOrFail();
          $building->name = $request->input("name");
          $building->save();
          return redirect(route("building"));
      }

      public function deleteBuilding(Request $request, $id)
      {
          $building = Building::where("id", $id)->firstOrFail();
          $building->delete();
          return redirect(route("building"));
      }


    /**
     * Alcances
     */
     public function alcances(Request $request)
     {
         $validator = $this::alcancesValidator($request->all());

         if ($validator->fails())
         {
             return redirect(route("landing"))->withErrors($validator)->withInput();
         }

         $alcances = Study::create([
             'building_id' => 1, // TODO cambiar en futuro, a modo de prueba
             'year' => date("U"), // TODO cambiar en futuro, a modo de prueba
             'a1_gas_natural_kwh' => $request->a1_gas_natural_kwh,
             'a1_gas_natural_nm3' => $request->a1_gas_natural_nm3,
             'a1_refrigerantes' => $request->a1_refrigerantes,
             'a1_recarga_gases_refrigerantes' => $request->a1_recarga_gases_refrigerantes,
             'a2_electricidad_kwh' => $request->a2_electricidad_kwh,
             'a3_agua_potable_m3' => $request->a3_agua_potable_m3,
             'a3_papel_carton_consumo_kg' => $request->a3_papel_carton_consumo_kg,
             'a3_papel_carton_residuos_kg' => $request->a3_papel_carton_residuos_kg,
             'a3_factor_kwh_nm3' => $request->a3_factor_kwh_nm3,
         ]);
     }

     protected function alcancesValidator(array $data)
     {
         return Validator::make($data, [
             'a1_gas_natural_kwh'=>'required',
             'a1_gas_natural_nm3'=>'required',
             'a1_refrigerantes'=>'required',
             'a1_recarga_gases_refrigerantes'=>'required',
             'a2_electricidad_kwh' => 'required',
             'a3_agua_potable_m3' => 'required',
             'a3_papel_carton_consumo_kg' => 'required',
             'a3_papel_carton_residuos_kg' => 'required',
             'a3_factor_kwh_nm3' => 'required',
         ]);
     }


    /**
     * Calculo huella
     */

     public function calculoHuella(Request $request)
     {
         $validator = $this::calculoHuellaValidator($request->all());

         if ($validator->fails())
         {
             return redirect(route("landing"))->withErrors($validator)->withInput();
         }

         $calculoHuella = calculoHuella::create([
            'calculo_huella' => $request->calculo_huella,
         ]);
     }

     protected function calculoHuellaValidator(array $data)
     {
         return Validator::make($data, [
             'calculo_huella' => 'required',
         ]);
     }

     /*
      * perfil del usuario
      */

      private function validateProfile($request) {
          $validator = Validator::make($request->all(), [
              'name' => 'required|string|min:5|max:255',
              'nif' => [
                  'nullable',
                  'alpha_num',
                  'max:9',
                  new ValidateDni
              ],
              'email' => [
                  'required',
                  'email',
                  'email',
                  'max:255',
                  Rule::unique('users')->ignore(Auth::id()),
              ],
              'telephone' => 'nullable|numeric|min:100000000|max:999999999',
          ]);

          return $validator;
      }

      public function showProfile(Request $request) {
          return view("user.profile");
      }

      public function saveProfile(Request $request) {
          $validator = $this->validateProfile($request);

          if ($validator->fails()) {
              return redirect(route("user.profile"))->withErrors($validator)->withInput();
          }

          $user = Auth::user();
          $user->name = $request->input("name");
          $user->nif = strtoupper($request->input("nif"));
          $user->telephone = $request->input("telephone");
          $user->email = $request->input("email");
          $user->save();

          return redirect(route("user.profile"));
      }

      public function showChangePassword() {
          abort("404");
      }

}
