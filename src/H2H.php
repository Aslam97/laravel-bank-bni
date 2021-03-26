<?php

namespace Aslam\Bni;

use Aslam\Bni\Bni;

class H2H extends Bni
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * getBalance
     *
     * @param  string $accountNo
     * @return \Aslam\Bni\Response
     */
    public function getBalance(string $accountNo)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/getbalance';
        return $this->sendRequest('POST', $requestUrl, compact('accountNo'));
    }
}
