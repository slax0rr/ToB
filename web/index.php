<?php

define("TOB_APP", true);

require_once __DIR__ . "/lib/translate.php";

$homePage = "fame";

$baseurl = (($_SERVER["SSL"] ?? "off") == "on" ? "https" : "http")
    . "://{$_SERVER["HTTP_HOST"]}"
    . str_replace($_SERVER["SCRIPT_NAME"], "", $_SERVER["REQUEST_URI"]);

$apiurl = "http://api.tob.local/v1/";

$customCSS = "";
$customHead = "";
$mainContent = "";
$customBottom = "";
$customJS = "";
$lang = "en";

$_t = new Translator;

switch (trim($_GET["p"])) {
case "home":
case "":
    $pageContent = require_once __DIR__ . "/templates/{$homePage}.php";
    $mainContent = $pageContent["body"] ?? "";
    $customJS = $pageContent["script"] ?? "";
    $customCSS = $pageContent["style"] ?? "";
default:
}

require_once __DIR__ . "/templates/layout.php";
