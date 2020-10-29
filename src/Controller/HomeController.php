<?php


namespace App\Controller;


use App\Entity\City;
use App\Repository\CityRepository;
use App\Service\Builder\CityBuilder;
use App\Service\Domain\CityService;
use App\Service\WeatherApi\ApiCityService;
use Exception;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/api/home/{name}", name="api_city" , methods={"GET"})
     * @param string $name
     * @param ApiCityService $apiCityService
     * @param CityRepository $cityRepository
     * @param CityService $cityService
     * @param CityBuilder $cityBuilder
     * @return JsonResponse
     * @throws JsonException
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function findOne(string $name,
                            ApiCityService $apiCityService,
                            CityRepository $cityRepository,
                            CityService $cityService,
                            CityBuilder $cityBuilder): JsonResponse
    {
        try {
            $city = new City();
            $fundedCity = $cityRepository->findOneByName($name);
            if ($fundedCity) {
                $city = $fundedCity;
            } else {
                $fundedApiCity = $apiCityService->findByCity($name);
                $city = $cityBuilder->build($city, $fundedApiCity);
                $cityService->save($city);
            }
            return $this->json($city, 200, [
                'Access-Control-Allow-Origin' => '*'
            ], [
                'groups' => 'showCity'
            ]);
        } catch (Exception $exception) {
            return new JsonResponse([
                'error' => $exception->getMessage()
            ]);
        }
    }
}