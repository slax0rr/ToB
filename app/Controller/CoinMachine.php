<?php
namespace App\Controller;

use SlaxWeb\Bootstrap\Application;
use ClanWolf\Library\CoinMachine\Pilot;
use ClanWolf\Library\CoinMachine\Machine;

class CoinMachine
{
	protected $app = null;
	protected $machine = null;
	protected $output = null;

	public function __construct(Application $app, Machine $machine)
	{
		$this->app = $app;
		$this->machine = $machine;

		$this->output = $this->app["output.service"];
		$this->app["outputHandler"] = "json";
	}

	// @todo: proper data validation
	public function getResult()
	{
		if (($p1 = $this->app["request.service"]->get("p1")) === null
			|| ($p2 = $this->app["request.service"]->get("p2")) === null
		) {
			$this->output->addError(
				"Pilot data missing",
				400,
				["pilot1" => $p1 ?? [], "pilot2" => $p2 ?? []]
			);
			return;
		}

		$this->machine->addPilot(
			(new Pilot)->setRank($p1["rank"])
			->setName($p1["name"])
			->setBloodname($p1["bloodname"])
			->setDate()
		);

		$this->machine->addPilot(
			(new Pilot)->setRank($p2["rank"])
			->setName($p2["name"])
			->setBloodname($p2["bloodname"])
			->setDate()
		);

		$results = $this->machine->getResult();
		$this->output->add([
			"hunter" => $results["hunter"],
			"hunted" => $results["hunted"]
		]);
	}
}
