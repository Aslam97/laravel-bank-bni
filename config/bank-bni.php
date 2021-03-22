<?php

return [
    'api_url' => env('BNI_API_URL', 'https://apidev.bni.co.id:8067'),

    /**
     * API Keys
     */
    'api_key' => env('BNI_API_KEY', '32fa75cd-fd14-46b5-b0b9-3cd253d3028b'),
    'api_secret' => env('BNI_API_SECRET', '52c443bd-e602-429b-8928-3e2e31232288'),

    /**
     * OAuth Credential
     */
    'client_id' => env('BNI_CLIENT_ID', 'e7617f7e-0a37-4ccd-9993-cfb605744e04'),
    'client_secret' => env('BNI_CLIENT_SECRET', '2a9609f2-b5e2-4b5c-bcf2-f952609dea3c'),

    /**
     * Client name is taken from the application name.
     */
    'client_name' => env('BNI_CLIENT_NAME', 'Govo'),
];
