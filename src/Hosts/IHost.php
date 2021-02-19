<?php

namespace App\Hosts;

use GuzzleHttp\Psr7\Request;

interface IHost {

    /**
     * @return float
     */
    public function getLoad() : float;

    /**
     * @param Request $request
     */
    public function handleRequest(Request $request) : void;
}