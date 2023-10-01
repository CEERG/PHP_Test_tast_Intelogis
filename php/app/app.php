<?php

use app\delivery\DeliveryServices;

$services = DeliveryServices::getServices();

$service = $services[array_rand($services)];

$requestData = [
    "from" => "1",
    "to" => "1",
    "weight" => 1.1
];

$responseData = $service->calculate($requestData);

var_dump($responseData);