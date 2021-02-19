<?php

require 'vendor/autoload.php';


use App\LoadBalancer\LoadBalancer;
use App\Hosts\SampleHost;
use App\LoadBalancer\Algorithms\Sequential;
use App\LoadBalancer\Algorithms\Clever;
use GuzzleHttp\Psr7\Request;

try {

    $hosts1 = [
        new SampleHost('LB1_H1 Sequential'),
        new SampleHost('LB1_H2 Sequential'),
        new SampleHost('LB1_H3 Sequential'),
    ];
    $LB1 = new LoadBalancer($hosts1, new Sequential());

    $hosts1 = [
        new SampleHost('LB2_H1 Clever'),
        new SampleHost('LB2_H2 Clever'),
        new SampleHost('LB2_H3 Clever'),
    ];
    $LB2 = new LoadBalancer($hosts1, new Clever());

    while(true) {
         switch (rand(0, 1)) {
             case 0:
                 $LB1->handleRequest(new Request('GET', ''));
                 break;
             case 1:
                 $LB2->handleRequest(new Request('GET', ''));
                 break;
         }
         sleep(1);
    }

} catch (Exception $e) {
    print_r($e->getMessage() . PHP_EOL);
}