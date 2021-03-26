<?php

namespace Aslam\Bni\Exceptions;

use Aslam\Bni\Response;

class RequestException extends HttpClientException
{
    /**
     * The response instance.
     *
     * @var \Aslam\Bni\Response
     */
    public $response;

    /**
     * Create a new exception instance.
     *
     * @param  \Aslam\Bni\Response  $response
     * @return void
     */
    public function __construct(Response $response)
    {
        parent::__construct($this->prepareMessage($response), $response->status());

        $this->response = $response;
    }

    /**
     * Prepare the exception message.
     *
     * @param  \Aslam\Bni\Response  $response
     * @return string
     */
    protected function prepareMessage(Response $response)
    {
        $message = "HTTP request returned status code {$response->status()}";

        $summary = \GuzzleHttp\Psr7\get_message_body_summary($response->toPsrResponse());

        return is_null($summary) ? $message : $message .= ":\n{$summary}\n";
    }
}
