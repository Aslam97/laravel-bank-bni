<?php

namespace Aslam\Bni;

use Aslam\Bni\Bni;

class H2H extends Bni
{
    public function __construct($token)
    {
        parent::__construct($token);
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

    /**
     * getInHouseInquiry
     *
     * @param  string $accountNo
     * @return \Aslam\Bni\Response
     */
    public function getInHouseInquiry(string $accountNo)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/getinhouseinquiry';
        return $this->sendRequest('POST', $requestUrl, compact('accountNo'));
    }

    /**
     * doPayment
     *
     * @param  array $fields
     * @return \Aslam\Bni\Response
     */
    public function doPayment(array $fields)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/dopayment';
        return $this->sendRequest('POST', $requestUrl, $fields);
    }

    /**
     * getPaymentStatus
     *
     * @param  string $customerReferenceNumber
     * @return \Aslam\Bni\Response
     */
    public function getPaymentStatus(string $customerReferenceNumber)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/getpaymentstatus';
        return $this->sendRequest('POST', $requestUrl, compact('customerReferenceNumber'));
    }

    /**
     * getInterBankInquiry
     *
     * @param  array $fields
     * @return \Aslam\Bni\Response
     */
    public function getInterBankInquiry(array $fields)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/getinterbankinquiry';
        return $this->sendRequest('POST', $requestUrl, $fields);
    }

    /**
     * getInterBankPayment
     *
     * @param  array $fields
     * @return \Aslam\Bni\Response
     */
    public function getInterBankPayment(array $fields)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/getinterbankpayment';
        return $this->sendRequest('POST', $requestUrl, $fields);
    }

    /**
     * holdAmount
     *
     * @param  array $fields
     * @return \Aslam\Bni\Response
     */
    public function holdAmount(array $fields)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/holdamount';
        return $this->sendRequest('POST', $requestUrl, $fields);
    }

    /**
     * holdAmountRelease
     *
     * @param  array $fields
     * @return \Aslam\Bni\Response
     */
    public function holdAmountRelease(array $fields)
    {
        $requestUrl = $this->apiUrl . '/H2H/v2/holdamountrelease';
        return $this->sendRequest('POST', $requestUrl, $fields);
    }
}
