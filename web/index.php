<?php

define("TOB_APP", true);

require_once __DIR__ . "/lib/translate.php";

$homePage = "fame";

$baseurl = (($_SERVER["SSL"] ?? "off") == "on" ? "https" : "http")
    . "://{$_SERVER["HTTP_HOST"]}"
    . str_replace($_SERVER["SCRIPT_NAME"], "", $_SERVER["REQUEST_URI"]);

$customCSS = "";
$customHead = "";
$mainContent = "";
$customBottom = "";
$customJS = "";
$lang = "en";

$_t = new Translator;

switch (trim($_GET["p"])) {
case "home":
default:
    $pageContent = require_once __DIR__ . "/templates/{$homePage}.php";
    $mainContent = $pageContent["body"];
}

require_once __DIR__ . "/templates/layout.php";
