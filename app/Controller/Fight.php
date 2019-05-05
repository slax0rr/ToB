<?php
namespace App\Controller;

class Fight extends Base
{
	public function save()
	{
		$fightModel = $this->app["loadDBModel.service"]("Fight");

		$data = [
			"tournamentid" => $this->request->get("tournamentid"),
			"fightnumber"  => $this->request->get("kampf_name"),
			"twitchstream" => $this->request->get("twitchchannel_name"),
			"oathmaster"   => $this->request->get("eidmeister_name"),

			"MW1_name"     => $this->request->get("spieler1_name"),
			"MW1_age"      => $this->request->get("spieler1_alter"),
			"MW1_sponsor"  => $this->request->get("spieler1_sponsor"),
			"MW1_rank"     => $this->request->get("spieler1_rang"),
			"MW1_house"    => $this->request->get("spieler1_bluthaus"),
			"MW1_unit"     => $this->request->get("spieler1_einheit"),

			"MW2_name"     => $this->request->get("spieler2_name"),
			"MW2_age"      => $this->request->get("spieler2_alter"),
			"MW2_sponsor"  => $this->request->get("spieler2_sponsor"),
			"MW2_rank"     => $this->request->get("spieler2_rang"),
			"MW2_house"    => $this->request->get("spieler2_bluthaus"),
			"MW2_unit"     => $this->request->get("spieler2_einheit"),

			"tonnagerange" => $this->request->get("tonnage"),
			"map"          => $this->request->get("karte"),
			"appointment"  => $this->request->get("termin"),
			"MW1_config"   => $this->request->get("spieler1_config"),
			"MW2_config"   => $this->request->get("spieler2_config"),
			"winner"       => $this->request->get("sieger"),
			"video"        => $this->request->get("video")
		];

		$status = $fightModel->create($data);
		if ($status !== true) {
			$error = $fightModel->lastError();
			$this->app["logger.service"]()->error(
				"An error occured when attempting to save the tournament.",
				["error" => $error->message, "query" => $error->query, "data" => $data]
			);

			$this->app["output.service"]->addError(
				"An error occured when attempting to save the tournament. Please try again later."
			);
			return;
		}

		$this->app["output.service"]->add([
			"message" => "Fight successfuly saved."
		]);
	}
}
