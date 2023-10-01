<?php

namespace app\delivery\Fast\api;

class FastApi
{
    public function request(string $from, string $to, float $weight): FastApiResponse
    {
        return new FastApiResponse(10, 10, "");
    }
}