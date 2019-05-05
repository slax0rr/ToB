<?php
/**
 * Default Routes Collection
 *
 * Provides a default route, to show how Routes must be defined in SlaxWeb
 * Framework.
 *
 * @package   SlaxWeb\Framework
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.3
 */
namespace App\Routes;

use SlaxWeb\Router\Route;
use SlaxWeb\Bootstrap\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultCollection extends \SlaxWeb\Bootstrap\Service\RouteCollection
{
	protected $beforeDispatch = "coinritual.route.beforeDispatch";

	/**
	 * Define routes
	 *
	 * Add routes to the internal 'routes' protected property. The '_container'
	 * protected property holds the DIC instance, and can be used freely.
	 *
	 * @return void
	 */
	public function define()
	{
		$this->routes[] = [
			"uri"       =>  "[:params:]?/?oathmaster/?[:named:]?|[:params:]?/?observer/?[:named:]?",
			"method"    =>  Route::METHOD_GET,
			"action"    =>  function(
				Request $request,
				Response $response,
				Application $app
			) {
				$controller = (new \App\Controller\Oathmaster($app))->init();
				$view = $app["loadView.service"]("Oathmaster");
				$controller->index($view);
				$app["output.service"]->add($view);
			}
		];

		$this->routes[] = [
			"uri"       =>  "[:params:]?/?rules/?",
			"method"    =>  Route::METHOD_GET,
			"action"    =>  function(
				Request $request,
				Response $response,
				Application $app
			) {
				$controller = new \App\Controller\Rules($app);
				$view = $app["loadView.service"]("Rules");
				$controller->index();
				$app["output.service"]->add($view);
			}
		];

		$this->routes[] = [
			"uri"       =>  "[:params:]?/?bloodnamed/?",
			"method"    =>  Route::METHOD_GET,
			"action"    =>  function(
				Request $request,
				Response $response,
				Application $app
			) {
				new \App\Controller\Bloodnamed($app);
				$app["output.service"]->add($app["loadView.service"]("Bloodnamed")
					->addSubTemplate("styles", "Bloodnamed/Styles"));
			}
		];

		$this->routes[] = [
			"uri"       =>  "coinMachine/getResult/?",
			"method"    =>  Route::METHOD_GET,
			"action"    =>  function(
				Request $request,
				Response $response,
				Application $app
			) {
				(new \App\Controller\CoinMachine(
					$app, new \ClanWolf\Library\CoinMachine\Machine
				))->getResult();
			}
		];

		$this->routes[] = [
			"uri"       =>  "[:params:]?/?tables/?",
			"method"    =>  Route::METHOD_GET,
			"action"    =>  function(
				Request $request,
				Response $response,
				Application $app
			) {
				// init controller to check for language
				new \App\Controller\Home($app);
				$app["output.service"]->add($app["loadView.service"]("Home")
					->addSubTemplate("styles", "Home/Styles"));
			}
		];

		$this->routes[] = [
			"uri"       =>  "fight/save/?",
			"method"    =>  Route::METHOD_POST,
			"action"    =>  function(
				Request $request,
				Response $response,
				Application $app
			) {
				$app["outputHandler"] = "json";
				(new \App\Controller\Fight($app))->save();
			}
		];

		$this->routes[] = [
			"uri"       =>  "[:params:]?/?|[:params:]?/?fame/?",
			"method"    =>  Route::METHOD_GET,
			"action"    =>  function(
				Request $request,
				Response $response,
				Application $app
			) {
				//$controller = new \App\Controller\Rules($app);
				//$view = $app["loadView.service"]("Fame");
				// $app["output.service"]->add($view);
				new \App\Controller\Fame($app);
				$app["output.service"]->add($app["loadView.service"]("Fame")
					->addSubTemplate("styles", "Fame/Styles"));
			}
		];
	}
}
