<?php


namespace App\Service\WeatherApi;


use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ApiCityValidator
 * @package App\Service\MagicTheGatheringApi
 */
class ApiCityValidator
{
    /**
     * @param array $data
     * @return array
     */
    public function validate(array $data): array
    {
        return (new OptionsResolver())
            ->setRequired('data')
            ->setAllowedTypes('data', ['array'])
            ->setDefined(array_keys($data))
            ->resolve($data);
    }
}