<?php

namespace App\Providers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

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
        $this->getUserInfo($request);
    }

    public function getUserInfo($request)
    {
        // Get the user's IP address
        $userIp = $request->ip();
        // Make a request to the ipinfo.io API
        $client = new Client();
        $response = $client->get("https://ipinfo.io/{$userIp}?token=7e5a5662ef114c");
        // Parse the JSON response
        $data = json_decode($response->getBody());
        // Extract user information
        $location = $data->loc;
        $country = $data->country;
        $currency = $data->currency;
        dd($data);
        // You can return the user information or use it as needed
        return view('user-info', compact('location', 'country', 'currency'));
    }
}