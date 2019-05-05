<?php
namespace ClanWolf\Library\CoinMachine;

class Pilot implements \JsonSerializable
{
	use \SlaxWeb\GetSet\MagicGet;

	protected $_rank = "";
	protected $_name = "";
	protected $_bloodname = "";
	protected $_date = "";

	public function jsonSerialize()
	{
		return [
			"rank"      => $this->_rank,
			"name"      => $this->_name,
			"bloodname" => $this->_bloodname,
			"date"      => $this->_date
		];
	}

	public function setRank(string $rank): self
	{
		$this->_rank = $rank;
		return $this;
	}

	public function setName(string $name): self
	{
		$this->_name = $name;
		return $this;
	}

	public function setBloodname(string $bloodname): self
	{
		$this->_bloodname = $bloodname;
		return $this;
	}

	public function setDate(string $date = ""): self
	{
		if ($date === "") {
			$date = date("d.m.3051");
		}
		$this->_date = $date;

		return $this;
	}
}
