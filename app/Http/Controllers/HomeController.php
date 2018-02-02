<?php

namespace App\Http\Controllers;

use App\Mail\ContactMailUser;
use App\Models\ContactoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Hash;

use App\Http\Controllers\MapboxCurl;

use App\Models\Building;
use App\Models\Country;
use App\Mail\ContactMailAdmin;
use App\Models\Region;
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
        return redirect(route("building"));
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

            if($request->ajax()){
                return response()->json(['error'=>$validator->errors()->all()]);
            }

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

         if($request->ajax()){
             return response()->json(['success'=>'Tu mensaje se ha enviado correctamente.']);
         }

         $request->session()->flash("isContactValid", true);

         return redirect(route("landing") . "#contacto");
     }

     protected function contactValidator(array $data)
     {
         return Validator::make($data, [
             'email' => 'required|string|email|max:255',
             'subject' => 'nullable|max:30',
             'message' => 'required',
         ]);
     }

     /**
      * Buildings
      */
      public function showTutorial() {
          return redirect(route("building"))->with(["showTutorial" => true]);
      }

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
              'description' => 'nullable|string',
              'country_id' => 'required|exists:countries,id',
              'region_id' => 'required|exists:regions,id',
              'postcode' => 'required|numeric|max:99999',
              'address' => 'required|string',
          ]);
      }

      public function geocodeBuilding(Building $building) {
          $mapbox = new MapboxCurl();
          $lngLat = $mapbox->geocode($building);

          if (gettype($lngLat) == "array") {
              $this->saveCoordinates($building, $lngLat);
          }
      }

      public function reverseGeocode(String $latitude, String $longitude) {
          $mapbox = new MapboxCurl();
          $reverseGeocode = $mapbox->reverseGeocode($latitude, $longitude);
          $geocode = Array();

          foreach($reverseGeocode->features as $feature) {
              $geocode[explode(".", $feature->id)[0]] = $feature->text;

          }
          return $geocode;
      }

      public function addBuilding(Request $request)
      {
          $validator = $this::buildingValidator($request->all());
          if ($validator->fails())
          {
              return redirect(route("building"))->withErrors($validator)->withInput();
          }

          $building = Building::create([
              'user_id' => Auth::id(),
              'name' => $request->name,
              'description' => $request->description,
              'country_id' => $request->country_id,
              'region_id' => $request->region_id,
              'postcode' => $request->postcode,
              'address_with_number' => $request->address,
          ]);

          if ($request->input("latitude")) {
              $building->latitude = $request->input("latitude");
              $building->longitude = $request->input("longitude");
              $building->save();

          } else {
              $this->geocodeBuilding($building);
          }

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
          $building->description = $request->input("description");
          $building->country_id = $request->input("country_id");
          $building->region_id = $request->input("region_id");
          $building->postcode = $request->input("postcode");
          $building->address_with_number = $request->input("address");

          if ($request->input("latitude")) {
              $building->latitude = $request->input("latitude");
              $building->longitude = $request->input("longitude");

              $this->setAddressFromCoordinates([
                  $building->longitude = $request->input("longitude"),
                  $building->latitude = $request->input("latitude")
              ], $building);
          }
          $building->save();

          return redirect(route("building"));
      }

      public function deleteBuilding(Request $request, $id)
      {
          $building = Building::where("id", $id)->firstOrFail();
          $building->delete();
          return redirect(route("building"));
      }

      private function saveCoordinates(Building $building, Array $lngLat) {
          $building->latitude = $lngLat[1];
          $building->longitude = $lngLat[0];
          $building->save();
      }

      private function setAddressFromCoordinates($lngLat, $building) {
          foreach ($this->reverseGeocode($lngLat[1], $lngLat[0]) as $type => $value) {
              switch ($type) {
                  case "address":
                      $building->address_with_number = $value;
                      break;

                  case "postcode":
                      $building->postcode = $value;
                      break;

                  case "region":
                      try {
                          $region = Region::where("name", ucwords(strtolower($value)))->first();
                          $building->region_id = $region->id;
                      } catch (Exception $e) {
                          $building->region_id = null;
                      }
                      break;

                  case "country":
                      try {
                          $country = Country::where("name", ucwords(strtolower($value)))->first();
                          $building->country_id = $country->id;
                      } catch (Exception $e) {
                          $building->country_id = null;
                      }
                  break;
              }
          }
      }

    /**
     * Alcances
     */
    public function alcancesView($id)
    {
        return (view("user.alcances", ['id'=>$id, "studies" => Building::find($id)->studies()->orderBy("year", "asc")->get()]));
    }

     public function alcances(Request $request)
     {
         $validator = $this::alcancesValidator($request->all());

         if ($validator->fails())
         {
             $validator->errors()->add("inputYear", $request->year);
             return redirect()->back()->withErrors($validator)->withInput();
         }

         $alcances = Study::updateOrCreate([
             'building_id' => $request->building_id,
             'year' => $request->year,
         ], [
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

         if ($request->input("submit") == "calculateStudy") {
             $this->calculateStudy($alcances);
         }

         return redirect(route("building"));
     }

     protected function alcancesValidator(array $data)
     {
         $validator = Validator::make($data, [
             'building_id'=>'required',
             'year' => [
                 'required',
                 'numeric',
                 'min:' . (date("Y") - 20),
             ],
             'a1_gas_natural_kwh'=>'required|numeric',
             'a1_gas_natural_nm3'=>'required|numeric',
             'a1_refrigerantes'=>'required|numeric',
             'a1_recarga_gases_refrigerantes'=>'required|numeric',
             'a2_electricidad_kwh' => 'required|numeric',
             'a3_agua_potable_m3' => 'required|numeric',
             'a3_papel_carton_consumo_kg' => 'required|numeric',
             'a3_papel_carton_residuos_kg' => 'required|numeric',
             'a3_factor_kwh_nm3' => 'required|numeric',
         ]);

         // validate ano field (create)
         $validator->sometimes('year', "unique:studies", function ($input) {
             return empty($input->id);
         });

         // validate ano field (update)
         $validator->sometimes('year', Rule::unique("studies")->ignore($data["id"], "id"), function ($input) {
             return !empty($input->id);
         });

         return $validator;
     }


    /**
     * Calculo huella
     */

     public function calculateStudy(Study $study) {
         $formula =
            $study->a1_gas_natural_kwh
            + $study->a1_gas_natural_nm3
            + $study->a1_refrigerantes
            + $study->a1_recarga_gases_refrigerantes
            + $study->a2_electricidad_kwh
            + $study->a3_agua_potable_m3
            + $study->a3_papel_carton_consumo_kg
            + $study->a3_papel_carton_residuos_kg
            + $study->a3_factor_kwh_nm3;

         $study->carbon_footprint = $formula;
         $study->save();
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
              'publicViewable' => 'required|boolean'
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
          $user->publicViewable = $request->input("publicViewable");
          $user->save();

          return redirect(route("user.profile"));
      }

      public function showChangePassword() {
          return view("user.changePassword");
      }

      private function validateChangePassword($request) {
          $validator = Validator::make($request->all(), [
              'currentPassword' => 'required',
              'newPassword' => 'required|confirmed|min:6',
          ]);

          return $validator;
      }

      public function changePassword(Request $request) {
          $validator = $this->validateChangePassword($request);
          $user = Auth::user();

          if ($validator->fails()) {
              return redirect(route("user.profile.changePassword"))->withErrors($validator);
          }

          if (Hash::check($request->input("currentPassword"), $user->password)) {
              $user->password = Hash::make($request->input("newPassword"));
              $user->save();

              return redirect(route("user.changePassword"))->with("changed", true);
              return $request->all();

          } else {
              $validator->errors()->add("currentPassword", trans("auth.failed"));
              return redirect(route("user.profile.changePassword"))->withErrors($validator);
          }

      }

}
