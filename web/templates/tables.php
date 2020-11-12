<?php
if (!defined("TOB_APP")) {
    die("Direct access not allowed");
}

$pageContent = [];
ob_start();
// body
?>

<iframe src="http://cwg.challonge.com/ToB_CW_B_201704/module?theme=3821&multiplier=1.0&match_width_multiplier=0.8&show_final_result=0"
    width="100%"
    height="95%"
    frameborder="0"
    scrolling="auto"
    allowtransparency="true">
</iframe>

<?php
$pageContent["body"] = ob_get_clean();

// style
ob_start();
?>

<style>
	.container {
		<!-- background-color: yellow; -->
		height: 100%;
		margin-bottom: 0px;
		padding-top: 25px;
		padding-bottom: 0px;
		padding-left: 0px;
		padding-right: 0px;
	}
</style>

<?php
$pageContent["style"] = ob_get_clean();

// return content
return $pageContent;
