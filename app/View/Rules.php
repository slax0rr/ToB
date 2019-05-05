<?php
namespace App\View;

use SlaxWeb\View\Base;

class Rules extends Base
{
	public function preRender(array &$data) {
		$data["showScroll"] = true;
	}
}
