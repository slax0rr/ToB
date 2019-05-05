<?php
namespace App\Provider;

class TranslatorService implements \Pimple\ServiceProviderInterface
{
    public function register(\Pimple\Container $app)
    {
        $app["translator.service"] = function(\Pimple\Container $app) {
            return new \App\Library\Translator\Manager(
                $app["loadDBModel.service"]("Translation"),
                $app["session.service"]->get("language", "")
            );
        };
    }
}
