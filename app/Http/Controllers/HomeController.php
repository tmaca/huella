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
     public function alcance1(Request $request)
     {
         $validator = $this::alcance1Validator($request->all());

         if ($validator->fails())
         {
             return redirect(route("landing"))->withErrors($validator)->withInput();
         }

         $alcance1 = Alcance1::create([
             'gas_natural_kwh' => $request->gas_natural_kwh,
             'gas_natural_nm3' => $request->gas_natural_nm3,
             'refrigerantes' => $request->refrigerantes,
             'recarga_gases_refrigerantes' => $request->recarga_gases_refrigerantes,
         ]);
     }

     protected function alcance1Validator(array $data)
     {
         return Validator::make($data, [
             'gas_natural_kwh'=>'required',
             'gas_natural_nm3'=>'required',
             'refrigerantes'=>'required',
             'recarga_gases_refrigerantes'=>'required',
         ]);
     }

     public function alcance2(Request $request)
     {
         $validator = $this::alcance1Validator($request->all());

         if ($validator->fails())
         {
             return redirect(route("landing"))->withErrors($validator)->withInput();
         }

         $alcance2 = Alcance2::create([
             'electricidad_kwh' => $request->electricidad_kwh,
         ]);
     }

     protected function alcance2Validator(array $data)
     {
         return Validator::make($data, [
             'electricidad_kwh' => 'required',
         ]);
     }

     public function alcance3(Request $request)
     {
         $validator = $this::alcance1Validator($request->all());

         if ($validator->fails())
         {
             return redirect(route("landing"))->withErrors($validator)->withInput();
         }

         $alcance3 = Alcance3::create([
            'agua_potable_m3' => $request->agua_potable_m3,
            'papel_carton_consumo_kg' => $request->papel_carton_consumo_kg,
            'papel_carton_residuos_kg' => $request->papel_carton_residuos_kg,
            'factor_kwh_nm3' => $request->factor_kwh_nm3,
         ]);
     }

     protected function alcance3Validator(array $data)
     {
         return Validator::make($data, [
             'agua_potable_m3' => 'required',
             'papel_carton_consumo_kg' => 'required',
             'papel_carton_residuos_kg' => 'required',
             'factor_kwh_nm3' => 'required',
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
