<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="ToB - Trial of Bloodright">
		<meta name="keywords" content="battletech, mechwarrior, clan, wolf, mech, battlemech, madcat, timberwolf, seyla, kerensky, bloodright, tob">
		<meta http-equiv="content-language" content="en">
		<meta name="robots" content="INDEX,FOLLOW">

		<title>Clan Wolf - Trial of Bloodright</title>

		<link rel="icon" type="image/png" href="<?= $baseurl; ?>/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?= $baseurl; ?>/favicon-16x16.png" sizes="16x16" />

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Share+Tech+Mono">
		<link rel="stylesheet" href="<?= $baseurl; ?>/css/noty.css">
		<link rel="stylesheet" href="<?= $baseurl; ?>/css/jquery.jscrollpane.css">
		<link rel="stylesheet" href="<?= $baseurl; ?>/css/stylesheet.css">

		<?= isset($subview_styles) ? $subview_styles : ""; ?>

		<script src="https://use.fontawesome.com/908b97f3a3.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	</head>

	<body>
		<div class="selected_flag">
			<a href="#">
				<img
					name="flag"
					id="flag"
					src="<?= $baseurl; ?>/img/flag/<?= empty($lang) === false ? $lang : "empty"; ?>.png"
					width="30px">
			</a>
		</div>

<?php
    if (isset($subview_head)):
        echo $subview_head;
    else:
?>
		<div class="head_structure" id="headstructure" style="z-index: 20;"></div>
<?php endif; ?>

		<div class="mech_left">
			<img name="galaxy" src="<?= $baseurl; ?>/img/timberwolf-left.png" width="330px">
		</div>
		<div class="mech_right">
			<img name="galaxy" src="<?= $baseurl; ?>/img/timberwolf-right.png" width="330px">
		</div>

		<div id="contentwindow" class="content">
			<div class="navigation">
				<?php
					$H_HALLOFFAME = $_t->translate("9802");
					$H_TABLES = $_t->translate("3020");
					$H_RULES = $_t->translate("3030");
					$H_OATHMASTER = $_t->translate("3050");
					$H_OBSERVER = $_t->translate("3060");
                ?>

				<a href="<?= $baseurl; ?>/fame"><?= $H_HALLOFFAME ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?= $baseurl; ?>/tables"><?= $H_TABLES ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?= $baseurl; ?>/rules"><?= $H_RULES ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?= $baseurl; ?>/oathmaster"><?= $H_OATHMASTER ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?= $baseurl; ?>/observer"><?= $H_OBSERVER ?></a>
				&nbsp;<br /><hr>
			</div>

			<div id="chselector" class="tourneyselector">
				<select title="Turnier" id='turnier_name' onchange='valueChanged();' class='select' name='turnier_name' size='1' style='width: 150px; top: 10px;'>
				<?php foreach($tourneys as $tourney): ?>
					<option value="<?= $tourney->id; ?>"><?= $tourney->name; ?></option>
				<?php endforeach; ?>
				</select>
				<a href="http://cwg.challonge.com/de/tob_cw_b_201704" target="_blank">...</a>

				<div class="tooltip2">
					<span class="tooltiptext2">
						<span style="white-space: nowrap; font-family: Courier; font-size: 9pt;">
							<?php
                                $file = 'http://www.clanwolf.net/mech_brackets.include';
                                readfile($file);
                            ?>
							<br><br>
							<i>http://www.clanwolf.net/mech_brackets.include</i>
						</span>
						<!--
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;25-35t:&nbsp;&nbsp;MLX|25&nbsp;&nbsp;ACH|30&nbsp;&nbsp;KFX|30&nbsp;&nbsp;ADR|35&nbsp;&nbsp;JR7|35</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;30-40t:&nbsp;&nbsp;ACH|30&nbsp;&nbsp;KFX|30&nbsp;&nbsp;ADR|35&nbsp;&nbsp;JR7|35&nbsp;&nbsp;VPR|40</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;35-45t:&nbsp;&nbsp;ADR|35&nbsp;&nbsp;JR7|35&nbsp;&nbsp;VPR|40&nbsp;&nbsp;IFR|45&nbsp;&nbsp;SHC|45</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;40-50t:&nbsp;&nbsp;VPR|40&nbsp;&nbsp;IFR|45&nbsp;&nbsp;SHC|45&nbsp;&nbsp;NVA|50&nbsp;&nbsp;HBK|50&nbsp;&nbsp;HMN|50</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;45-55t:&nbsp;&nbsp;IFR|45&nbsp;&nbsp;SHC|45&nbsp;&nbsp;NVA|50&nbsp;&nbsp;HBK|50&nbsp;&nbsp;HMN|50&nbsp;&nbsp;SCR|55</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;50-60t:&nbsp;&nbsp;NVA|50&nbsp;&nbsp;HBK|50&nbsp;&nbsp;HMN|50&nbsp;&nbsp;SCR|55&nbsp;&nbsp;MDD|60</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;55-65t:&nbsp;&nbsp;SCR|55&nbsp;&nbsp;MDD|60&nbsp;&nbsp;EBJ|65&nbsp;&nbsp;HBR|65&nbsp;&nbsp;LBK|65</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;60-70t:&nbsp;&nbsp;MDD|60&nbsp;&nbsp;EBJ|65&nbsp;&nbsp;HBR|65&nbsp;&nbsp;LBK|65&nbsp;&nbsp;SMN|70</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;65-75t:&nbsp;&nbsp;EBJ|65&nbsp;&nbsp;HBR|65&nbsp;&nbsp;LBK|65&nbsp;&nbsp;SMN|70&nbsp;&nbsp;TBR|75&nbsp;&nbsp;ON1|75&nbsp;&nbsp;NGT|75</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;70-80t:&nbsp;&nbsp;SMN|70&nbsp;&nbsp;TBR|75&nbsp;&nbsp;ON1|75&nbsp;&nbsp;NGT|75&nbsp;&nbsp;GAR|80</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;75-85t:&nbsp;&nbsp;TBR|75&nbsp;&nbsp;ON1|75&nbsp;&nbsp;NGT|75&nbsp;&nbsp;GAR|80&nbsp;&nbsp;MAD|85&nbsp;&nbsp;WHK|85</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;80-90t:&nbsp;&nbsp;GAR|80&nbsp;&nbsp;MAD|85&nbsp;&nbsp;WHK|85&nbsp;&nbsp;HGN|90</span><br>
						<span style="white-space: nowrap; font-family: Courier;">&nbsp;85-95t:&nbsp;&nbsp;MAD|85&nbsp;&nbsp;WHK|85&nbsp;&nbsp;HGN|90&nbsp;&nbsp;EXE|95</span><br>
						<span style="white-space: nowrap; font-family: Courier;">90-100t:&nbsp;&nbsp;HGN|90&nbsp;&nbsp;EXE|95&nbsp;&nbsp;DWF|100&nbsp;KDK|100</span>
						 -->
					</span>
					#
				</div>
			</div>

			<div class="container <?php if (($showScroll ?? false)): ?>with-scroll<?php endif; ?>">
				<?= $mainView; ?>
			</div>

			<div class="hudcenteranimation">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 1000 1000" style="enable-background:new 0 0 1000 1000;" xml:space="preserve">

                    <!-- Stroke ring -->
                    <circle class="st0" cx="500" cy="500" r="302.8">
                        <animateTransform attributeType="xml"
                            attributeName="transform"
                            type="rotate"
                            from="0 500 500"
                            to="360 500 500"
                            dur="100s"
                            repeatCount="indefinite"/>
                    </circle>

                    <!-- Inner ring -->
                    <circle class="st1" cx="500" cy="500" r="237.7">
                        <animateTransform attributeType="xml"
                            attributeName="transform"
                            type="rotate"
                            from="0 500 500"
                            to="360 500 500"
                            dur="40s"
                            repeatCount="indefinite"/>
                    </circle>

                    <!-- Outer ring -->
                    <circle class="st2" cx="500" cy="500" r="366.8" transform="rotate(0 500 500)";>
                        <animateTransform attributeType="xml"
                            attributeName="transform"
                            type="rotate"
                            from="0 500 500"
                            to="-360 500 500"
                            dur="50s"
                            repeatCount="indefinite"/>
                    </circle>

                    <!-- Outer thin ring -->
                    <circle class="st3" cx="500" cy="500" r="395.1"/>
                </svg>
            </div>

        </div>

<?php
    if (isset($subview_bottom)):
        echo $subview_bottom;
    else:
?>
        <div class="content_language_selector" style="top: -1px; z-index: 0;">
            <table style="width: 300px; border-collapse: collapse; border-spacing: 0px; border: 0px; margin: 0px; padding: 0px;">
                <tr>
                    <td style="padding: 0px;" width="100px" style="text-align:right;">
                        <img src="<?= $baseurl; ?>/img/selector_left.png"
                             width="100px"
                             height="550px">
                    </td>
                    <td style="padding: 0px;" width="100px" style="text-align:center;">
                        <img src="<?= $baseurl; ?>/img/selector_center.png"
                             width="100px"
                             height="550px">
                    </td>
                    <td style="padding: 0px;" width="100px" style="text-align:left;">
                        <img src="<?= $baseurl; ?>/img/selector_right.png"
                             width="100px"
                             height="550px">
                    </td>
                </tr>
            </table>
        </div>
<?php endif; ?>
    <div class="bottom">
		<script>
			var appData = {
				baseurl: '<?= $baseurl; ?>'
			};
		</script>

		<script src="<?= $baseurl; ?>/js/script.js"></script>
		<script src="<?= $baseurl; ?>/js/cookies.js"></script>
		<script src="<?= $baseurl; ?>/js/typewriter.js"></script>
		<script src="<?= $baseurl; ?>/js/howler.min.js"></script>
		<script src="<?= $baseurl; ?>/js/sound.js"></script>

		<script src="<?= $baseurl; ?>/js/noty.min.js"></script>
		<script src="<?= $baseurl; ?>/js/jquery.mousewheel.js"></script>
		<script src="<?= $baseurl; ?>/js/jquery.jscrollpane.min.js"></script>

		<script>
			$(function() {
				var container = $('.container.with-scroll');
				container.jScrollPane({
					hideFocus:      true,
					verticalGutter: 10
				});
				container.each(
					function() {
						$(this).jScrollPane({
							showArrows: $(this).is('.arrow')
						});
						var api = $(this).data('jsp');
						var throttleTimeout;
						$(window).bind(
							'resize',
							function() {
								// IE fires multiple resize events while you are dragging the browser window which
								// causes it to crash if you try to update the scrollpane on every one. So we need
								// to throttle it to fire a maximum of once every 300 milliseconds...
								if (!throttleTimeout) {
									throttleTimeout = setTimeout(
										function() {
											api.reinitialise();
											throttleTimeout = null;
										},
										300
									);
								}
							}
						);
					}
				)
			});
		</script>

		<?= isset($subview_scripts) ? $subview_scripts : ""; ?>

		<script type="text/javascript">
			if (sound === "on") {
				document.write("<span id='soundswitch'><a href='#' onclick='setSoundOff();'><i class='fa fa-volume-up fa-lg' aria-hidden='true'></i></a></span>");
			} else {
				document.write("<span id='soundswitch'><a href='#' onclick='setSoundOn();'><i class='fa fa-volume-off fa-lg' aria-hidden='true'></i></a></span>");
			}
		</script>
	</div>

	</body>

</html>
