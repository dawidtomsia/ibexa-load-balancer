<?php


namespace App\LoadBalancer\Algorithms;


use App\Hosts\IHost;
use App\Traits\HostsArrayChecker;
use Exception;
use GuzzleHttp\Psr7\Request;

abstract class BaseAlgorithm implements IAlgorithm
{
    use HostsArrayChecker;

    /**
     * @param array $hosts
     * @param Request $request
     * @return IHost
     * @throws Exception
     */
    public function getCalculatedHost(array $hosts, Request $request): IHost
    {
        $this->checkHostsArray($hosts);

        return $this->calculateHost($hosts, $request);
    }

    /**
     * The argument data is already parsed.
     *
     * @param array $hosts
     * @param Request $request
     * @return IHost
     */
    abstract protected function calculateHost(array $hosts, Request $request): IHost;
}