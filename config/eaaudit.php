<?php

return [
    /*
    |--------------------------------------------------------------------------
    | NICS EA Audit
    |--------------------------------------------------------------------------
    |
    */
    'enabled' => env('NICS_EA_AUDIT_ENABLED', true),
    'cognito_url' => env('NICS_EA_COGNITO_URL'),
    'cognito_user' => env('NICS_EA_COGNITO_USER'),
    'cognito_password' => env('NICS_EA_COGNITO_PASSWORD'),
    'api' => env('NICS_EA_AUDIT_API')
];
