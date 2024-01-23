<?php

namespace App\Providers;

use App\Models\Visitor;
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
        $clientIpAddress = $request->getClientIp();
        Visitor::create(['ip_address' => $clientIpAddress]);
    }
}