<?php
namespace App\Controller;

use SlaxWeb\Bootstrap\Application;
use SlaxWeb\Router\Response;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class Base
{
	protected $app = null;
	protected $session = null;
	protected $request = null;
	protected $response = null;

	public function __construct(Application $app)
	{
		$this->app = $app;
		$this->session = $app["session.service"];
		$this->request = $app["request.service"];
		$this->response = $app["response.service"];

		if (($app["outputHandler"] ?? "") !== "json") {
			$this->setViewParams();
		}
	}

	protected function setViewParams()
	{
		$this->app["output.service"]->addData([
			"baseurl"    => $this->app["baseUrl"],
			"lang"       => $this->session->get("language"),
			"_t"         => $this->app["translator.service"],
			"tourneys"   => $this->app["loadDBModel.service"]("Tournament")->getActive(),
			"showScroll" => false
		]);
	}
}
