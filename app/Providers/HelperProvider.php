<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Cargar todos los archivos de helper en la carpeta app/Helpers
        $helperFiles = glob(app_path('Helpers').'/*.php'); // Obtener todos los archivos PHP en el directorio Helpers

        foreach ($helperFiles as $file) {
            require_once $file; // Incluir cada archivo
        }
    }
}
