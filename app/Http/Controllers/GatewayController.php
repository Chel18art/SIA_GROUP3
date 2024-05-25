<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GatewayController extends Controller
{
    public function getNews()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://news-api14.p.rapidapi.com/top-headlines', [
            'headers' => [
                'X-RapidAPI-Host' => 'news-api14.p.rapidapi.com',
                'X-RapidAPI-Key' => '983b4f923emsh17584e3a8986231p1fa806jsnc56a0e308f2d',
            ],
            'query' => [
                'country' => 'us',
                'language' => 'en',
                'pageSize' => 10,
                'category' => 'sports'
            ]
        ]);

        return $response->getBody();
    }

    public function googleSearch()
    {
        $client = new Client();

        $response = $client->request('POST', 'https://google-api31.p.rapidapi.com/websearch', [
            'json' => [
                "text" => "Google",
                "safesearch" => "off",
                "timelimit" => "",
                "region" => "wt-wt",
                "max_results" => 20
            ],
            'headers' => [
                'X-RapidAPI-Host' => 'google-api31.p.rapidapi.com',
                'X-RapidAPI-Key' => '983b4f923emsh17584e3a8986231p1fa806jsnc56a0e308f2d',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $response->getBody();
    }

    public function getCurrentWeather()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://ai-weather-by-meteosource.p.rapidapi.com/current', [
            'query' => [
                'lat' => '37.81021',
                'lon' => '-122.42282',
                'timezone' => 'auto',
                'language' => 'en',
                'units' => 'auto',
            ],
            'headers' => [
                'X-RapidAPI-Host' => 'ai-weather-by-meteosource.p.rapidapi.com',
                'X-RapidAPI-Key' => '983b4f923emsh17584e3a8986231p1fa806jsnc56a0e308f2d',
            ],
        ]);

        return $response->getBody();
    }

    public function getRandomQuote()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://get-quotes-api.p.rapidapi.com/random', [
            'headers' => [
                'x-rapidapi-host' => 'get-quotes-api.p.rapidapi.com',
                'x-rapidapi-key' => '4123b0a04dmsh6904a8dcecad229p17ba38jsndcdfb75e3498',
            ],
        ]);

        return $response->getBody();
    }
}