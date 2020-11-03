<?php


namespace App\Service\Builder;



class AirQualityBuilderService
{
    public function buildCity(string $key, array $fundedApiCity)
    {


        $fundedApiCity['city']['name'] = $fundedApiCity['city']['name'] ?? "";
        $fundedApiCity['aqi'] = (float)$fundedApiCity['aqi'] ?? 0;
        $fundedApiCity['iaqi'][$key] = (float)$fundedApiCity['iaqi'][$key]['v'] ?? null;
        $fundedApiCity['iaqi'][$key] = (float)$fundedApiCity['iaqi'][$key]['v'] ?? null;
        $fundedApiCity['iaqi'][$key] = (float)$fundedApiCity['iaqi'][$key]['v'] ?? null;
        $fundedApiCity['time']['s'] = $fundedApiCity['time']['s'] ?? "";

        $key = array_key_exists($key, $fundedApiCity['iaqi'])
            ? (float)$fundedApiCity['iaqi'][$key]['v']
            : null;
        return $key;
    }
}