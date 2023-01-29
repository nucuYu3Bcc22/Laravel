<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WheatherController extends Controller
{
    //
     public function wheather($type = null) 
 {
   $city = "Tokyo,jp";
   $appid = "317fb67cf8c15e3c4cc6f85032868e78";
   $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&APPID=" . $appid;

   $json = file_get_contents( $url );
   $json = mb_convert_encoding( $json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN' );
   $json_decode = json_decode( $json );

   //現在の天気
   if( $type  === "weather" ):
     $out = $json_decode->weather[0]->main;

   //現在の天気アイコン
   elseif( $type === "icon" ):
     $out = "<img src='https://openweathermap.org/img/wn/" . $json_decode->weather[0]->icon . "@2x.png'>";

   //現在の気温
   elseif( $type  === "temp" ):
     $out = $json_decode->main->temp;

   //パラメータがないときは配列を出力
   else:
     $out = $json_decode;

   endif;
     return $out;
   return view('news.index', ['weather' => $out, 'icon' => $out, 'temp' => $out]);
}
}
