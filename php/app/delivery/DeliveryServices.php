<?php

namespace app\delivery;

use app\delivery\Fast\FastDeliveryService;
use app\delivery\Slow\SlowDeliveryService;

class DeliveryServices
{
    /**
     * @return AbstractDeliveryService[]
     */
    public static function getServices(): array
    {
        return [
            new FastDeliveryService(),
            new SlowDeliveryService()
        ];
    }
}