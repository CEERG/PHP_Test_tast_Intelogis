<?php

namespace app\delivery;

abstract class AbstractDeliveryService
{
    public function calculate(array $params): DeliveryServiceResponse
    {
        if (!$this->serviceIsAvailable()) {
            return new DeliveryServiceResponse(0,0, "Service unavailable");
        }

        $paramsValidation = $this->validateParams($params);
        if (!empty($paramsValidation)) {
            $errors = implode(", ", $paramsValidation);

            return new DeliveryServiceResponse(0,0, "Params are invalid: $errors");
        }

        return $this->calc($params);
    }

    protected abstract function serviceIsAvailable(): bool;

    protected abstract function validateParams(array $params): array;

    protected abstract function calc(array $params): DeliveryServiceResponse;
}