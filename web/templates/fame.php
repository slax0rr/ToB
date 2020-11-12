<?php
if (!defined("TOB_APP")) {
    die("Direct access not allowed");
}

$pageContent = [];
// body
ob_start();
?>

<div class="wrapper">
    <h1><?= $_t->translate("9802") ?></h1>
    <p>"Each of the original 800 warriors who followed Nicholas Kerensky on his Second Exodus and returned with him to 
    the Pentagon Worlds in 2821 during Operation Klondike were immortalized as founders of their Bloodname House. 
    These progenitors formed the foundation of the Clans' eugenics program, and all warriors born to a given Bloodname 
    legacy since that time are considered to be part of their associated Bloodname House by virtue of relation to the 
    progenitor. Eligibility is determined by matrilineal descent; beyond the first generations to be decanted, no 
    warrior may ever claim more than one Bloodhouse. (...)"
    <br>[<a href="http://www.sarna.net/wiki/Bloodhouse" target="_blank">Sarna</a>]</p>

    <p align="center">Last Winner:<br><span id="last-winner-name">IDee FETLADRAL</span></p>

    <p align="center"><i>Houses are sorted by the number of members,<br>warriors are sorted alphabetically by first name.<br><br></i></p>

    <table width="100%" id="winners-table">
        <thead>
            <tr>
                <th><?= $_t->translate("9810") ?></th>
                <th><?= $_t->translate("9820") ?></th>
                <th></th>
                <th><?= $_t->translate("8160") ?></th>
                <th><?= $_t->translate("8110") ?></th>
                <th><?= $_t->translate("9860") ?></th>
                <th><?= $_t->translate("9870") ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<?php
$pageContent["body"] = ob_get_clean();

// script
ob_start();
?>
<script src="<?= $baseurl; ?>/js/fame.js"></script>
<?php
$pageContent["script"] = ob_get_clean();

// style
ob_start();
?>
<style>
	#chselector {
		display: none;
	}
	td { 
		padding: 0px;
	}
	table { 
		border-spacing: 0px;
		border-collapse: separate;
	}
</style>

<?php
$pageContent["style"] = ob_get_clean();

// return content
return $pageContent;
