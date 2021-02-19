<?php


namespace App\LoadBalancer\Algorithms;


use App\Hosts\IHost;
use GuzzleHttp\Psr7\Request;

class Sequential extends BaseAlgorithm
{
    private int $hostsIterator = 0;

    protected function calculateHost(array $hosts, Request $request): IHost
    {
        if (!isset($hosts[$this->hostsIterator])) {
            $this->hostsIterator = 0;
        }

        $host = $hosts[$this->hostsIterator++];

        return $host;
    }
}