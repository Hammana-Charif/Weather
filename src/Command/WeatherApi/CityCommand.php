<?php


namespace App\Command\WeatherApi;

use App\Service\WeatherApi\ApiCityService;
use JsonException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class CityCommand
 * @package App\Command\MagicTheGathering
 */
class CityCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'aq:city';

    /**
     * @var ApiCityService
     */
    private ApiCityService $apiCityService;

    /**
     * CityCommand constructor.
     * @param ApiCityService $apiCityService
     */
    public function __construct(ApiCityService $apiCityService)
    {
        parent::__construct();
        $this->apiCityService = $apiCityService;
    }

    /**
     * Set description
     */
    protected function configure(): void
    {
        $this->setDescription('Search cards');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $cityName = 'cannes';
            dump($this->apiCityService->findByCity($cityName));
            $output->writeln('Funded city : ' . $cityName);
            return static::SUCCESS;
        } catch (JsonException $e) {
            $output->writeln($e->getMessage());
        } catch (ClientExceptionInterface $e) {
            $output->writeln($e->getMessage());
        } catch (RedirectionExceptionInterface $e) {
            $output->writeln($e->getMessage());
        } catch (ServerExceptionInterface $e) {
            $output->writeln($e->getMessage());
        } catch (TransportExceptionInterface $e) {
            $output->writeln($e->getMessage());
        }
    }
}