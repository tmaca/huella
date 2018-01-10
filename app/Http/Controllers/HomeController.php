<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailUser;
use App\Models\ContactoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\ContactMailAdmin;
use App\Models\Building;
use App\Models\Study;

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
         Mail::to("pruebaslaravelzubiri@gmail.com")->send(new ContactMailAdmin());

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

      public function saveBuilding(Request $request)
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

      protected function buildingValidator(array $data)
      {
          return Validator::make($data, [
              'name' => 'required|string|max:35',
          ]);
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


}
