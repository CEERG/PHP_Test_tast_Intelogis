<?php

namespace app\delivery\Slow;

use app\delivery\AbstractDeliveryService;
use app\delivery\DeliveryServiceResponse;
use app\delivery\Slow\api\SlowApi;
use app\delivery\Slow\api\SlowApiResponse;

class SlowDeliveryService extends AbstractDeliveryService
{
    private const BASE_PRICE = 150;

    protected function serviceIsAvailable(): bool
    {
        return true;
    }

    protected function validateParams(array $params): array
    {
        return [];
    }

    protected function calc(array $params): DeliveryServiceResponse
    {
        $api = new SlowApi();

        $apiResponse = $api->request($params["from"], $params["to"], $params["weight"]);

        return $this->formatResponse($apiResponse);
    }

    private function formatResponse(SlowApiResponse $apiResponse): DeliveryServiceResponse
    {
        $price = $apiResponse->coefficient * self::BASE_PRICE;

        return new DeliveryServiceResponse($price, $apiResponse->date, $apiResponse->error);
    }
}