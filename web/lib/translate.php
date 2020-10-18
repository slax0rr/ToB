<?php
if (!defined("TOB_APP")) {
    die("Direct access not allowed");
}

class Translator {
    public function translate(string $key) :string {
        return "translated {$key}";
    }
}
