<?php


namespace App\Service\WeatherApi;

use JsonException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ApiCityService
 * @package App\Service\MagicTheGatheringApi
 */
class ApiCityService
{
    /**
     * @var AirQualityApiService
     */
    private AirQualityApiService $airQualityApiService;

    /**
     * ApiCityService constructor.
     * @param AirQualityApiService $airQualityApiService
     */
    public function __construct(AirQualityApiService $airQualityApiService)
    {
        $this->airQualityApiService = $airQualityApiService;
    }

    /**
     * @param string $cityName
     * @return mixed
     * @throws ClientExceptionInterface
     * @throws JsonException
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function findByCity(string $cityName): array
    {
        return $this->airQualityApiService->findACity($cityName)['data'];
    }
}