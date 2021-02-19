<?php


namespace App\LoadBalancer\Algorithms;


use App\Hosts\IHost;
use GuzzleHttp\Psr7\Request;

class Clever extends BaseAlgorithm
{
    private const LOAD_RATE_ABOVE = 0.75;

    protected function calculateHost(array $hosts, Request $request): IHost
    {
        $minLoadRate = 1;
        $minLoadRateHost = null;

        foreach ($hosts as $host) {

            $loadRate = $host->getLoad();

            if ($loadRate < self::LOAD_RATE_ABOVE) {
                return $host;
            }

            if ($loadRate < $minLoadRate) {
                $minLoadRate = $loadRate;
                $minLoadRateHost = $host;
            }

        }

        return $minLoadRateHost;
    }

}