<?php
namespace App\Model;

class Tournament extends \SlaxWeb\Database\BaseModel
{
	public function getActive()
	{
		$this->where("end_date", null, "IS NULL")
			->orWhere("end_date", ["func" => "NOW()"], ">=");
		$this->select(["id", "name"]);

		return $this->getResults();
	}
}
