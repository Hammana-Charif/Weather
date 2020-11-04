<?php


namespace App\Service\Builder;


use Exception;
use stdClass;

/**
 * Class AirQualityBuilderService
 * @package App\Service\Builder
 */
class AirQualityBuilderService
{
    /**
     * @param array $fundedApiCity
     * @return stdClass
     */
    public function buildApiCity(array $fundedApiCity): stdClass
    {
        try {
            $apiCity = new stdClass();
            $apiCity->name = $fundedApiCity['city']['name'] ?? "";
            $apiCity->airQuality = (float)$fundedApiCity['aqi'] ?? null;
            $apiCity->fineParticle
                = array_key_exists('pm25', $fundedApiCity['iaqi'])
                ? (float)$fundedApiCity['iaqi']['pm25']['v']
                : null;
            $apiCity->heavyParticle
                = array_key_exists('pm10', $fundedApiCity['iaqi'])
                ? (float)$fundedApiCity['iaqi']['pm10']['v']
                : null;
            $apiCity->ozone
                = array_key_exists('o3', $fundedApiCity['iaqi'])
                ? (float)$fundedApiCity['iaqi']['o3']['v']
                : null;
            $apiCity->dateTime = $fundedApiCity['time']['s'] ?? "";
            return $apiCity;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}