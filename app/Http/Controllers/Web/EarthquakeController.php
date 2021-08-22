<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EarthquakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson');
        // $response = $request->getBody();
        $response = json_decode($request->getBody()->getContents(), true);
        // print_r($response);
        // print_r(json_encode($response));
        // return $response['features'];
        // foreach($response['features'] as $feature) {
        //     return $feature['geometry']['coordinates'][0];
        // }
        return view('earthquake.index', ['response' => $response]);
    }
}
