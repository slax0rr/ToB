<?php
if (!defined("TOB_APP")) {
    die("Direct access not allowed");
}

$pageContent = [];
ob_start();
// body
?>

<?php
    $rules = $_t->translate("6000");
    $mech_brackets = file_get_contents('http://www.clanwolf.net/mech_brackets.include');
    $rules_replaced = str_replace("#$$$#", $mech_brackets, $rules);
?>

<?= $rules_replaced ?>

<br>
<hr>
<br>

<?= $_t->translate("7000"); ?>

<?php
$pageContent["body"] = ob_get_clean();

// return content
return $pageContent;
