<?php
namespace App\Provider;

class CookieFactory implements \Pimple\ServiceProviderInterface
{
    public function register(\Pimple\Container $app)
    {
        $app["cookie.factory"] = $app->factory(function(\Pimple\Container $app) {
            $cookie = new \Symfony\Component\HttpFoundation\Cookie(
                $app["cookie.data"]["name"] ?? null,
                $app["cookie.data"]["value"] ?? "",
                $app["cookie.data"]["expire"] ?? 0,
                $app["cookie.data"]["path"] ?? "/"
            );

            $app["cookie.data"] = [
                "name"      =>  "",
                "value"     =>  null,
                "expire"    =>  0,
                "path"      =>  "/"
            ];

            return $cookie;
        });
    }
}
