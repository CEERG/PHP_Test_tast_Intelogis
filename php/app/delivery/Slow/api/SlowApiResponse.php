<?php

namespace app\delivery\Slow\api;

class SlowApiResponse
{
    public function __construct(
        public float $coefficient,
        public string $date,
        public string $error
    ) {}
}