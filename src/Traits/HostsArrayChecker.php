<?php

namespace App\Traits;

use App\Hosts\IHost;
use Exception;

trait HostsArrayChecker
{

    /**
     * @param array $hosts
     * @throws Exception
     */
    private function checkHostsArray(array $hosts) : void
    {
        if (empty($hosts)) {
            throw new Exception('Hosts array is empty');
        }

        foreach ($hosts as $host) {
            if (!$host instanceof IHost) {
                throw new Exception('All hosts must be instance of IHost');
            }
        }
    }
}