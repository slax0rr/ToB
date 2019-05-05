<?php
namespace App\Hook;

use SlaxWeb\Router\Route;
use SlaxWeb\Bootstrap\Application as App;

class CoinRitualHooks extends \SlaxWeb\Hooks\Service\Definition
{
	public function define()
	{
		$this->hooks["coinritual.route.beforeDispatch"] = function(App $app) {
			$this->checkLanguage($app);
		};
	}

	protected function checkLanguage(App $app)
	{
		$allowedLang = $app["config.service"]["language.allowed"];
		$lang = $app["request.service"]->query->get("parameters")[0] ?? "";

		if (in_array($lang, $allowedLang) === false) {
			$lang = $app["session.service"]->get(
				"language",
				$app["request.service"]->cookies->get("language", "")
			);
		}

		if (in_array($lang, $allowedLang) === false) {
			$app["response.service"]->redirect("/language");
			exit;
		}
		$app["session.service"]->set("language", $lang);

		$app["cookie.data"] = [
			"name"      =>  "language",
			"value"     =>  $lang,
			"expire"    =>  (new \DateTime)->add(new \DateInterval("P1Y"))
		];
		$app["response.service"]->headers->setCookie($app["cookie.factory"]);
	}
}
