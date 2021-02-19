<?php

namespace App\LoadBalancer;

use App\Hosts\IHost;
use App\LoadBalancer\Algorithms\IAlgorithm;
use App\Traits\HostsArrayChecker;
use GuzzleHttp\Psr7\Request;
use Exception;

class LoadBalancer
{
    use HostsArrayChecker;

    private IAlgorithm $algorithm;

    /**
     * @var IHost[]
     */
    protected array $hosts = [];

    /**
     * LoadBalancer constructor.
     * @param array $hosts
     * @param IAlgorithm $algorithm
     * @throws Exception
     */
    public function __construct(array $hosts, IAlgorithm $algorithm)
    {
        $this->checkHostsArray($hosts);
        $this->hosts = $hosts;
        $this->algorithm = $algorithm;
    }

    public function handleRequest(Request $request) : void
    {
        $host = $this->algorithm->getCalculatedHost($this->hosts, $request);
        $host->handleRequest($request);
    }
}