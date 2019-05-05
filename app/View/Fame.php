<?php
namespace App\View;

use SlaxWeb\View\Base;

class Fame extends Base
{
	public function preRender(array &$data) {
		$data["showScroll"] = true;
	}
}
