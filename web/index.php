<?php

define("TOB_APP", true);

require_once __DIR__ . "/lib/translate.php";

$homePage = "fame";

$baseurl = (($_SERVER["SSL"] ?? "off") == "on" ? "https" : "http")
    . "://{$_SERVER["HTTP_HOST"]}"
    . substr($_SERVER["REQUEST_URI"], 0,  strpos($_SERVER["REQUEST_URI"], $_SERVER["SCRIPT_NAME"]));

$apiurl = "http://api.tob.local/v1/";

$customCSS = "";
$customHead = "";
$mainContent = "";
$customBottom = "";
$customJS = "";
$lang = "en";

$_t = new Translator;
$pageContent = "";

switch (trim($_GET["p"])) {
case $homePage:
case "":
    $pageContent = require_once __DIR__ . "/templates/{$homePage}.php";
    break;

default:
    $pageContent = require_once __DIR__ . "/templates/404.php";
    break;
}

$mainContent = $pageContent["body"] ?? "";
$customJS = $pageContent["script"] ?? "";
$customCSS = $pageContent["style"] ?? "";

require_once __DIR__ . "/templates/layout.php";
