<?php


namespace App\Service\WeatherApi;

use JsonException;
use Exception;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class AirQualityApiService
 * @package App\Service\MagicTheGatheringApi
 */
class AirQualityApiService
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    /**
     * @var string
     */
    private string $token;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var ApiCityValidator
     */
    private ApiCityValidator $apiCityValidator;

    /**
     * AirQualityApiService constructor.
     * @param HttpClientInterface $httpClient
     * @param ApiCityValidator $apiCityValidator
     * @param string $token
     * @param string $host
     */
    public function __construct(HttpClientInterface $httpClient,
                                ApiCityValidator $apiCityValidator,
                                string $token,
                                string $host)
    {
        $this->httpClient = $httpClient;
        $this->token = $token;
        $this->url = "http://$host";
        $this->apiCityValidator = $apiCityValidator;
    }

    /**
     * @param string|null $cityName
     * @return array
     * @throws ClientExceptionInterface
     * @throws JsonException
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function findACity(string $cityName): array
    {
        try {
            $url = $this->url . "/feed/$cityName/?token=" . $this->token;
            $request = $this->httpClient->request('GET', $url);
            $json = $request->getContent();
            return $this->apiCityValidator->validate(
                json_decode($json, true, 512, JSON_THROW_ON_ERROR)
            );
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}