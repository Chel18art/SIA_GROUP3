<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Response;

class PlantController extends Controller
{
    public function getPlant()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://plants2.p.rapidapi.com/api/plants?id=63ef4eb7476230641c4c0d62', [
                'headers' => [
                    'Authorization' => 'GKZOHNZj0xP65kk0BAE2Tl9LGagm0pfD3DFNxAEEZcMQBhRZVDco8vbNJdnwwCo0',
                    'X-RapidAPI-Host' => 'plants2.p.rapidapi.com',
                    'X-RapidAPI-Key' => '983b4f923emsh17584e3a8986231p1fa806jsnc56a0e308f2d',
                ],
            ]);

            return response($response->getBody()->getContents(), $response->getStatusCode())
                ->header('Content-Type', 'application/json');

        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch plant data', 'message' => $e->getMessage()], 500);
        }
    }
}
