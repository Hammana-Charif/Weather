<?php


namespace App\Service\Builder;


use App\Entity\City;
use Exception;

/**
 * Class CityBuilder
 * @package App\Service\Builder
 */
class CityBuilder
{
    /**
     * @param City $city
     * @param array $fundedApiCity
     * @return City
     */
    public function build(City $city, array $fundedApiCity): City
    {
        try {
            $city->setName($fundedApiCity['city']['name'] ?? "");
            $city->setAirQuality((float)$fundedApiCity['aqi'] ?? "");
            $city->setFineParticle((float)$fundedApiCity['iaqi']['pm25']['v'] ?? "");
            $city->setHeavyParticle((float)$fundedApiCity['iaqi']['pm10']['v'] ?? "");
            $city->setOzone((float)$fundedApiCity['iaqi']['o3']['v'] ?? "");
            $city->setDatetime($fundedApiCity['time']['s'] ?? "");
            return $city;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}