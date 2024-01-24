<?php

namespace App\Providers;

use App\Models\Visitor;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {
        // Get the user's IP address
        $userIp = $request->ip();

        // Make a request to the ipinfo.io API
        if (app()->isProduction()) {
            $client = new Client();
        } else {
            $client = new Client(['verify' => false]);
        }

        $response = $client->get("https://ipinfo.io/{$userIp}?token=7e5a5662ef114c");

        // Parse the JSON response
        $data = json_decode($response->getBody());

        // Extract user information
        isset($data->ip) ? ($ip = $data->ip) : ($ip = null);
        isset($data->loc) ? ($location = $data->loc) : ($location = null);
        isset($data->city) ? ($city = $data->city) : ($city = null);
        isset($data->region) ? ($region = $data->region) : ($region = null);
        isset($data->country) ? ($country = $data->country) : ($country = null);
        isset($data->postal) ? ($postal = $data->postal) : ($postal = null);
        isset($data->timezone) ? ($timezone = $data->timezone) : ($timezone = null);
        isset($data->currency) ? ($currency = $data->currency) : ($currency = null);

        //Add them to the database
        Visitor::create([
            'ip_address' => $ip,
            'location' => $location,
            'city' => $city,
            'region' => $region,
            'country' => $country,
            'postal' => $postal,
            'timezone' => $timezone,
            'currency' => $currency,
        ]);
    }

}