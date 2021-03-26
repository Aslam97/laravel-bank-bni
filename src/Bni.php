<?php

namespace Aslam\Bni;

use Aslam\Bni\Exceptions\ConnectionException;
use Aslam\Bni\Exceptions\RequestException;
use Aslam\Bni\H2H;
use Aslam\Bni\Traits;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class Bni
{
    use Traits\Token;

    protected $apiUrl;

    private $clientId;

    private $clientSecret;

    private $token;

    public function __construct($token = null)
    {
        $this->apiUrl = config('bank-bni.api_url');
        $this->clientId = config('bank-bni.client_id');
        $this->clientSecret = config('bank-bni.client_secret');
        $this->token = $token;
    }

    /**
     * sendRequest
     *
     * @param  string $httpMethod
     * @param  string $requestUrl
     * @param  array $options
     * @return \Aslam\Bni\Response
     *
     * @throws \Aslam\Bni\Exceptions\RequestException
     */
    public function sendRequest(string $httpMethod, string $requestUrl, array $data = [])
    {
        try {
            $options = ['http_errors' => false];

            if (!$this->token) {
                $options = array_merge($options, $data);
            } else {

                // set token
                $options['query'] = ['access_token' => $this->token];

                // set headers
                $options['headers'] = [
                    'Content-Type' => 'application/json',
                    'X-API-Key' => config('bank-bni.api_key'),
                ];

                // set body
                $options['json'] = generate_signature($data);
                // dd($options);
            }

            return tap(
                new Response(
                    (new Client())->request($httpMethod, $requestUrl, $options)
                ),
                function ($response) {
                    if (!$response->successful()) {
                        $response->throw();
                    }
                }
            );

        } catch (ConnectException $e) {
            throw new ConnectionException($e->getMessage(), 0, $e);
        } catch (RequestException $e) {
            return $e->response;
        }
    }

    /**
     * setToken
     *
     * @param  string $token
     * @return $this
     */
    public function setToken(string $token)
    {
        $this->token = $token;

        return $this;
    }

    public function h2h()
    {
        return new H2H($this->token);
    }
}
