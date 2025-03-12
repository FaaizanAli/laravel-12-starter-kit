<?php

namespace App\Providers;

use Dedoc\Scramble\Scramble;
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
    public function boot(): void
    {
        //
        // Define an array with API versions and corresponding file names
        $apiVersions = [
            'v1' => 'api/v1.php',
            'v2' => 'api/v2.php',
        ];
        // Loop through each API version and register it
        foreach ($apiVersions as $version => $fileName) {
            Scramble::registerApi($version, [
                'api_path' => 'api/' . $version,
                'file_name' => $fileName, // Assign the file name here
            ]);
        }

        Scramble::ignoreDefaultRoutes();
    }
}
