<?php
namespace App\View;

use SlaxWeb\View\AbstractLoader as Loader;

abstract class Base extends \SlaxWeb\View\Base
{
    protected $translator = null;

    public function setTranslator(\App\Library\Translator\Manager $translator): Base
    {
        $this->translator = $translator;
        return $this;
    }

    public function preRender(array &$data)
    {
        $data["_t"] = $this->translator;
    }
}
