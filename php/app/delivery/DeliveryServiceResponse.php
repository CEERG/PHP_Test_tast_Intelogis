<?php

namespace app\delivery;

class DeliveryServiceResponse
{
    public function __construct(
        public float $price,
        public string $date,
        public string $error
    ) {}
}