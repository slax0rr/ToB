<?php
namespace App\Controller;

class Fame extends Base
{
	public function index(\App\View\Fame $view)
	{
		$view->addSubTemplate("styles", "Fame/Styles");
	}
}
