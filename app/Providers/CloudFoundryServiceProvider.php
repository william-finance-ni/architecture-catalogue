<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Log;

class CloudFoundryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // If the app is running in a PaaS environment.
        if (env('VCAP_SERVICES', null) !== null) {
            // Decode the JSON provided by Cloud Foundry.
            $config = json_decode(env('VCAP_SERVICES'), true);
            $mysqlConfig = $config['mysql'][0]['credentials'];

            // Set the MySQL config.
            Config::set('database.connections.mysql.host', $mysqlConfig['host']);
            Config::set('database.connections.mysql.port', $mysqlConfig['port']);
            Config::set('database.connections.mysql.database', $mysqlConfig['name']);
            Config::set('database.connections.mysql.username', $mysqlConfig['username']);
            Config::set('database.connections.mysql.password', $mysqlConfig['password']);

            Log::debug('Database name: ' . $mysqlConfig['name']);
            Log::debug('Database user: ' . $mysqlConfig['username']);
            Log::debug('Database password: ' . $mysqlConfig['password']);
        }
    }
}