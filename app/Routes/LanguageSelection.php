<?php
namespace App\Routes;

use SlaxWeb\Router\Route;
use SlaxWeb\Bootstrap\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageSelection extends \SlaxWeb\Bootstrap\Service\RouteCollection
{
	public function define()
	{
		$this->routes[] = [
			"uri"       =>  "language",
			"method"    =>  Route::METHOD_GET,
			"action"    =>  function (
				Request $request,
				Response $response,
				Application $app
			) {
				$view = $app["loadTemplate.service"]("Language");
				$view->addSubTemplate("bottom", "Language/Bottom")
					->addSubTemplate("head", "Language/Head")
					->addSubTemplate("scripts", "Language/Scripts")
					->addSubTemplate("styles", "Language/Styles");

				$app["output.service"]
					->add($view)
					->addData([
						"baseurl"  => $app["baseUrl"],
						"_t"       => $this->app["translator.service"],
						"tourneys" => []
					]);
			}
		];
	}
}
