<?php

use Aslam\Bni\Bni;

if (!function_exists('bniapi')) {

    /**
     * bniapi
     *
     * @return Bri
     */
    function bniapi()
    {
        return app(Bni::class);
    }
}

if (!function_exists('signature')) {

    function generate_signature(array $payload)
    {
        $payload = array_merge(['clientId' => 'IDBNI' . base64_encode(config('bank-bni.client_name'))], $payload);

        // Create token header as a JSON string
        $stringHeader = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

        // Create token payload as a JSON string
        $stringPayload = json_encode($payload);

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($stringHeader));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($stringPayload));

        // Create Signature Hash
        $signature = hash_hmac(
            'sha256',
            $base64UrlHeader . '.' . $base64UrlPayload,
            config('bank-bni.api_secret'),
            true
        );

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        $jwtSignature = $base64UrlHeader . '.' . $base64UrlPayload . '.' . $base64UrlSignature;

        $payload = array_merge($payload, ['signature' => $jwtSignature]);

        return $payload;
    }
}
