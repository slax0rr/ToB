<?php
if (!defined("TOB_APP")) {
    die("Direct access not allowed");
}

$pageContent = [];
// body
ob_start();
?>

Page not found.

<?php
$pageContent["body"] = ob_get_clean();

// return content
return $pageContent;
