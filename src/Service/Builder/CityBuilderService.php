<?php


namespace App\Service\Builder;


use App\Entity\City;
use Exception;

/**
 * Class CityBuilderService
 * @package App\Service\Builder
 */
class CityBuilderService
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

            $city->setAirQuality((float)$fundedApiCity['aqi'] ?? 0);

            $fineParticle = array_key_exists('pm25', $fundedApiCity['iaqi'])
                ? (float)$fundedApiCity['iaqi']['pm25']['v']
                : null;
            $city->setFineParticle($fineParticle);

            $heavyParticle = array_key_exists('pm10', $fundedApiCity['iaqi'])
                ? (float)$fundedApiCity['iaqi']['pm10']['v']
                : null;
            $city->setHeavyParticle($heavyParticle);

            $fineOzone = array_key_exists('o3', $fundedApiCity['iaqi'])
                ? (float)$fundedApiCity['iaqi']['o3']['v']
                : null;
            $city->setOzone($fineOzone);

            $city->setDatetime($fundedApiCity['time']['s'] ?? "");
            return $city;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}