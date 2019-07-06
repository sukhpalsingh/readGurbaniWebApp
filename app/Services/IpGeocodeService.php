<?php

namespace App\Services;

use App\IpLocation;
use Carbon\Carbon;
use GuzzleHttp\Client;

class IpGeocodeService
{
    private $url = "http://ip-api.com/json/";

    public function geocodeIpAddress()
    {
        $ipLocation = IpLocation::whereNull('country')->first();
        if (empty($ipLocation)) {
            return;
        }
        
        $client = new Client([
            'base_uri' => $this->url,
            'timeout'  => 10.0,
        ]);
        $response = $client->request(
            'GET',
            $ipLocation->ip
        );

        $code = $response->getStatusCode();
        if ($code === 200) {
            $response = json_decode($response->getBody()->getContents(), true);
            if (isset($response['country']) && isset($response['lat']) && isset($response['lon'])) {
                $ipLocation->country = $response['country'];
                $ipLocation->longitude = $response['lon'];
                $ipLocation->latitude = $response['lat'];

                if (isset($response['region'])) {
                    $ipLocation->region = $response['region'];
                }

                if (isset($response['city'])) {
                    $ipLocation->city = $response['city'];
                }

                $ipLocation->save();
            }
        }
    }
}