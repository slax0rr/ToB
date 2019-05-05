<?php
namespace App\Library\Translator;

use App\Model\Translation as TranslationModel;

class Manager
{
    protected $translations = null;
    protected $languge = "";
    protected $container = [];

    public function __construct(TranslationModel $translations, string $language)
    {
        $this->translations = $translations;
        $this->language = $language;

        $this->loadStrings();
    }

    public function translate(string $key, string $language = "")
    {
        return $this->container[$language ?: $this->language][$key] ?? "Unknown translation string";
    }

    // @todo: save and load from cache?
    protected function loadStrings()
    {
        $this->translations->select(["language", "tkey", "value"]);
        $result = $this->translations->getResults();
        foreach ($result as $row) {
            $this->container[$row->language][$row->tkey] = $row->value;
        }
    }
}
