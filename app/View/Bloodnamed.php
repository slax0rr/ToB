<?php
namespace App\View;

use SlaxWeb\View\Base;

class Bloodnamed extends Base
{
	public function preRender(array &$data) {
		$data["showScroll"] = true;
	}
}
