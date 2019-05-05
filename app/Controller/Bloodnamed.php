<?php
namespace App\Controller;

class Bloodnamed extends Base
{
	public function index(\App\View\Bloodnamed $view)
	{
		$view->addSubTemplate("styles", "Bloodnamed/Styles");
	}
}
