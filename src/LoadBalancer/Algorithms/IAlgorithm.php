<?php

namespace App\LoadBalancer\Algorithms;

use App\Hosts\IHost;
use GuzzleHttp\Psr7\Request;

interface IAlgorithm
{
    public function getCalculatedHost(array $hosts, Request $request) : IHost;
}