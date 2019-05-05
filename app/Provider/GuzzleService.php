<?php
namespace App\Provider;

class GuzzleService implements \Pimple\ServiceProviderInterface
{
    public function register(\Pimple\Container $app)
    {
        $app["httpClient.service"] = function(\Pimple\Container $app) {
            return new \GuzzleHttp\Client($app["config.service"]["httpclient.settings"]);
        };
    }
}
