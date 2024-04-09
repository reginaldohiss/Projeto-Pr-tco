<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

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
    public function boot(): void
    {
        Response::macro('jsonResponse', function ( array $data = null, int $status = 200, string $message = 'OK' ) {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
                'recordsFiltered' => count($data),
                'recordsTotal' => count($data),
            ], $status);
        });
    }
}
