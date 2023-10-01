<?php

namespace app\delivery\Fast\api;

class FastApiResponse
{
    public function __construct(
        public float $price,
        public int $period,
        public string $error
    ) {}
}