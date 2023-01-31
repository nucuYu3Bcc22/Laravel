<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WheatherController extends Controller
{
    //
    public function index(Request $request) 
    {
        $apiKey = "317fb67cf8c15e3c4cc6f85032868e78";
        $cityname = "Tokyo,jp";
        $googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . $cityname . "&lang=ja&units=metric&appid=" . $apiKey;
    
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        
        curl_close($ch);
        $data = json_decode($response);
        $currentTime = time();
    
       
        return view('weather.index', ['currentTime' => $currentTime, 'data' => $data]);
    }



}
