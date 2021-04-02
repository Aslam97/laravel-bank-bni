<?php

namespace Aslam\Bni\Traits;

trait Token
{
    /**
     * Get Bni Token
     *
     * @return \Aslam\Response\Response
     */
    public function getToken()
    {
        $requestUrl = $this->apiUrl . '/api/oauth/token';

        return $this->sendRequest('POST', $requestUrl, [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
            ],
        ]);
    }
}
