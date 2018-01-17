<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Building;

class MapboxCurl extends Controller
{
    private $API_KEY;// = env("MAPBOX_TOKEN");
    private $API_URL = "https://api.mapbox.com";
    private $endpoint;

    public function __construct() {
        $this->API_KEY = env("MAPBOX_TOKEN");
    }

    private function query() {
        $url = $this->API_URL . $this->endpoint . "&access_token=" . $this->API_KEY;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function geocode(Building $building) {
        $this->endpoint = "/geocoding/v5/mapbox.places/".
            urlencode($building->address_with_number . "," . $building->region->name) .
            ".json?" .
            "types=address&" .
            "country=es";//. //" " . $building->country->name . "," .
            "region=" . $building->region->name . "&" .
            "postcode=" . $building->postcode;

        $response = $this->query();

        if (!$response === false) {
            $response = json_decode($response);
            try {
                return $response->features[0]->center;
            } catch (Exception $e) {
                return json_decode("{\"message\":\"Error taking coordinates\"}");
            }
        }
        return json_decode("{\"message\":\"Error on CURL request\"}");
    }
}
