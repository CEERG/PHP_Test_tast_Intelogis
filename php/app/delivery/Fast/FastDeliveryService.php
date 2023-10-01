<?php

namespace app\delivery\Fast;

use app\delivery\AbstractDeliveryService;
use app\delivery\DeliveryServiceResponse;
use app\delivery\Fast\api\FastApi;
use app\delivery\Fast\api\FastApiResponse;

class FastDeliveryService extends AbstractDeliveryService
{
    private const AVAILABLE_FROM = "08:00:00";
    private const AVAILABLE_TO = "18:00:00";

    protected function serviceIsAvailable(): bool
    {
        $availableFrom = strtotime("today ".self::AVAILABLE_FROM);
        $availableTo = strtotime("today ".self::AVAILABLE_TO);
        $current = time();

        return $current >= $availableFrom && $current <= $availableTo;
    }

    protected function validateParams(array $params): array
    {
        return [];
    }

    protected function calc(array $params): DeliveryServiceResponse
    {
        $api = new FastApi();

        $apiResponse = $api->request($params["from"], $params["to"], $params["weight"]);

        return $this->formatResponse($apiResponse);
    }

    private function formatResponse(FastApiResponse $apiResponse): DeliveryServiceResponse
    {
        $date = date('Y-m-d', strtotime("today + $apiResponse->period days"));

        return new DeliveryServiceResponse($apiResponse->price, $date, $apiResponse->error);
    }
}