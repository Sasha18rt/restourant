<?php

namespace App\Models;

class Weather
{
    public static function getWeather() {
        $apiKey = '0b580603623895202561cc304afa1019';
        $city = 'vilnius';
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
        
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        
        $data = json_decode($response, true);
        
        if ($data['cod'] == 200) {
            $weatherCondition = $data['weather'][0]['main'];
            $temperature = $data['main']['temp'];
            return [$weatherCondition, $temperature];
        } else {
            return [null, null];
        }
    }
}
