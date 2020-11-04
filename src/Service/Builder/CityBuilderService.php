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
            $apiCityBuilder = new AirQualityBuilderService();
            $apiCity = $apiCityBuilder->buildApiCity($fundedApiCity);
            $city->setName($apiCity->name);
            $city->setAirQuality($apiCity->airQuality);
            $city->setFineParticle($apiCity->fineParticle);
            $city->setHeavyParticle($apiCity->heavyParticle);
            $city->setOzone($apiCity->ozone);
            $city->setDatetime($apiCity->dateTime);
            return $city;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}