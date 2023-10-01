<?php

namespace app\delivery\Slow\api;

class SlowApi
{
    public function request(string $from, string $to, float $weight): SlowApiResponse
    {
        return new SlowApiResponse(0.5, date('Y-m-d', time()), "");
    }
}