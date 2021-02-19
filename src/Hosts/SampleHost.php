<?php

namespace App\Hosts;

use GuzzleHttp\Psr7\Request;


class SampleHost implements IHost
{
    private $name;

    /**
     * Host constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getLoad() : float
    {
        $load = rand(1, 100)/100;

        print_r($this->name . " load:" . $load . PHP_EOL);

        return $load;
    }

    /**
     * @param Request $request
     */
    public function handleRequest(Request $request) : void
    {
        unset($request);
        print_r($this->name . " " . __FUNCTION__ . "()" . PHP_EOL);
    }
}