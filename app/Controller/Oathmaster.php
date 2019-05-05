<?php
namespace App\Controller;

use GuzzleHttp\Exception\TransferException;
use SlaxWeb\Cache\Exception\CacheException;

class Oathmaster extends Base
{
	protected $cache = null;
	protected $client = null;
	protected $auth = [];

	public function init(): self
	{
		$this->cache = $this->app["cache.service"];
		$this->client = $this->app["httpClient.service"];
		$authData = $this->app["config.service"]["httpclient.auth"];
		$this->auth = [$authData["user"], $authData["pass"], $authData["type"]];
		return $this;
	}

	/**
	 * @todo: move the client stuff to library to keep code clean
	 */
	public function index(\App\View\Oathmaster $view)
	{
		$tourneys = [];
		try {
			$tourneys = $this->cache->read("challongeTournaments");
		} catch (CacheException $e) {
			try {
				$response = $this->client->get(
					"tournaments.json",
					["auth" => $this->auth, "query" => ["subdomain" => "CWG"]]
				);
				$tourneys = (string)$response->getBody();
				$this->cache->write("challongeTournaments", $tourneys, 2592000);
			} catch (TransferException $e) {
				$this->app["logger.service"]()->error(
					"Error when attempting to retrieve tournament data from Challonge",
					["exception" => $e]
				);
			}
		}

		$view->viewData = [
			"activeStep"	=>	$this->request->query->get("step") ?: "1",
			"observer"		=>	strpos($this->request->getRequestUri(), "oathmaster") === false,
			"tourneys"		=>	$tourneys
		];

		$view->addSubTemplate("styles", "Oathmaster/Styles")
			->addSubTemplate("scripts", "Oathmaster/Scripts");
	}
}
