<form action="<?= $baseurl; ?>/fight/save" method="POST" class="auto-post ritual-form">
	<div class="ritual-step ritual-step-1">
		<h1 align='center'><?= $_t->translate("8000") ?></h1>

<?php if ($observer !== true): ?>
		<div id='access' name='access' align='center' style='padding:5px;border:2px; border-style:dashed; border-color:#e32400;background-color:#831100;'>
			<table width='100%' cellpadding='0' cellspacing='0'>
				<tr>
					<td align='left' width='100px'>
						&nbsp;&nbsp;&nbsp;<img src='<?= $baseurl; ?>/img/key.png' width='40px'>
					</td>
					<td align='center'>
						<input type='text' name='lme' id='lme' value='' maxlength='30' class='textbox' style='text-align:center; width:200px;' onchange='valueChanged();'>
					</td>
					<td align='left' width='100px'>&nbsp;</td>
				</tr>
			</table>
		</div>
<?php endif; ?>

		<br>
		<p><?= $_t->translate("8010") ?></p>
		<br>
		<table>
			<tr>
				<td align='right' colspan='1'><?= $_t->translate("8030") ?>:</td>
				<td align='left' colspan='4'><input type='text' onchange='valueChanged();' name='kampf_name'
					id='kampf_name' value='' maxlength='160' class='input'>&nbsp;&nbsp;(<?= $_t->translate("8030") ?> @challonge.com)</td>
			</tr>
			<tr>
				<td align='right' colspan='1'>Twitch:</td>
				<td align='left' colspan='4'><input type='text' onchange='valueChanged();' name='twitchchannel_name'
					id='twitchchannel_name' value='' maxlength='160' class='input'>&nbsp;&nbsp;(<?= $_t->translate("8060") ?>)</td>
			</tr>
			<tr>
				<td align='right' colspan='1'><?= $_t->translate("8050") ?>:</td>
				<td align='left' colspan='4'><input type='text' onchange='valueChanged();' name='eidmeister_name'
					id='eidmeister_name' value='' maxlength='160' class='input'></td>
			</tr>
		</table>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 1 / 8</div>
		<div class="buttons">
			<?= $_t->translate("3010") ?> | <span class="next-link"><a href="" id="next_Step01_Step02" class="ritual-switch not-active" data-step="2"><?= $_t->translate("3000") ?></a></span>
		</div>
	</div>

	<!--                                                                                         Step 2 -->

	<div class="ritual-step ritual-step-2">
		<h1 align='center'><?= $_t->translate("8170") ?></h1>

		<table width="100%">
			<tr>
				<td colspan='2' align='left'><span><b><?= $_t->translate("8160") ?> 1</b></span></td>
				<td></td>
				<td colspan='2' align='right'><span><b><?= $_t->translate("8160") ?> 2</b></span></td>
			</tr>
			<tr>
				<td colspan='2' align='left'><i>(<?= $_t->translate("8070") ?>)</i><br><br></td>
				<td></td>
				<td colspan='2' align='right'><i>(<?= $_t->translate("8080") ?>)</i><br><br></td>
			</tr>
			<tr>
				<td width='70px' align='right'><?= $_t->translate("8090") ?>:</td>
				<td width='200px' align='left'><input type='text' onchange='valueChanged();' id='spieler1_name'
					name='spieler1_name' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
				<td rowspan='7' valign='bottom' align='center'><img
					src='<?= $baseurl; ?>/img/coinmachine.png' width='120px'></td>
				<td width='70px' align='right'><?= $_t->translate("8090") ?>:</td>
				<td width='200px' align='left'><input type='text' onchange='valueChanged();' id='spieler2_name'
					name='spieler2_name' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
			</tr>
			<tr>
				<td align='right'><?= $_t->translate("8100") ?>:</td>
				<td align='left'><input type='text' onchange='valueChanged();' id='spieler1_alter'
					name='spieler1_alter' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
				<td align='right'><?= $_t->translate("8100") ?>:</td>
				<td align='left'><input type='text' onchange='valueChanged();' id='spieler2_alter'
					name='spieler2_alter' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
			</tr>
			<tr>
				<td align='right'><?= $_t->translate("8110") ?>:</td>
				<td align='left'><input type='text' onchange='valueChanged();' id='spieler1_sponsor'
					name='spieler1_sponsor' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
				<td align='right'><?= $_t->translate("8110") ?>:</td>
				<td align='left'><input type='text' onchange='valueChanged();' id='spieler2_sponsor'
					name='spieler2_sponsor' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
			</tr>
			<tr>
				<td align='right'><?= $_t->translate("8120") ?>:</td>
				<td align='left'><input type='text' onchange='valueChanged();' id='spieler1_einheit'
					name='spieler1_einheit' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
				<td align='right'><?= $_t->translate("8120") ?>:</td>
				<td align='left'><input type='text' onchange='valueChanged();' id='spieler2_einheit'
					name='spieler2_einheit' value='' maxlength='50' class='input'
					style='width: 150px;'></td>
			</tr>
			<tr>
				<td align='right'><?= $_t->translate("8130") ?>:</td>
				<td align='left'><select id='spieler1_rang' onchange='valueChanged();' class='select'
					name='spieler1_rang' size='1' style='width: 150px;'>
						<option>--- <?= $_t->translate("8150") ?> ---</option>
						<option value='MW'>MW</option>
						<option value='SCom'>SCom</option>
						<option value='SCpt'>SCpt</option>
						<option value='SCol'>SCol</option>
						<option value='GCom'>GCom</option>
						<option value='K'>K</option>
				</select></td>
				<td align='right'><?= $_t->translate("8130") ?>:</td>
				<td align='left'><select id='spieler2_rang' onchange='valueChanged();' class='select'
					name='spieler2_rang' size='1' style='width: 150px;'>
						<option>--- <?= $_t->translate("8150") ?> ---</option>
						<option value='MW'>MW</option>
						<option value='SCom'>SCom</option>
						<option value='SCpt'>SCpt</option>
						<option value='SCol'>SCol</option>
						<option value='GCom'>GCom</option>
						<option value='K'>K</option>
				</select></td>
			</tr>
			<tr>
				<td align='right'><?= $_t->translate("8140") ?>:</td>
				<td align='left'><select id='spieler1_bluthaus' onchange='valueChanged();' class='select'
					name='spieler1_bluthaus' size='1' style='width: 150px;'>
						<option>--- <?= $_t->translate("8150") ?> ---</option>
						<option>Kerensky     - CW   / ALL (exl)</option>
						<option>Ward         - CW   / MW  (exl)</option>
						<option>Kemp         - CW   / ?   (div)</option>
						<option>Schroeder    - CW   / ?   (div)</option>
						<option>Shaw         - CW   / ELE (exl)</option>
						<option>Wallace      - CW   / ?   (div)</option>
						<option>Fetladral    - CW   / ALL (exl)</option>
						<option>Parker       - CW   / ?   (div)</option>
						<option>Radick       - CW   / MW  (exl)</option>
						<option>Richardson   - CW   / ?   (div)</option>
						<option>Tinn         - CW   / ?   (div)</option>
						<option>Tutuola      - CW   / ELE (exl)</option>
						<option>Demos        - CW   / ?   (div)</option>
						<option>Kissiel      - CW   / ?   (div)</option>
						<option>Torshi       - CW   / ?   (div)</option>
						<option>Carns        - CW   / MW  (exl)</option>
						<option>DeVega       - CW   / ?   (div)</option>
						<option>Kerderk      - CW   / ?   (div)</option>
						<option>Mehta        - CW   / PLT (exl)</option>
						<option>Nygren       - CW   / ?   (div)</option>
						<option>Rhyde        - CW   / PLT (exl)</option>
						<option>Sherbow      - CW   / ?   (div)</option>
						<option>Jennings     - CW   / ?   (div)</option>
						<option>Saline       - CW   / ?   (div)</option>
						<option>Sender       - CW   / MW  (exl)</option>
						<option>Stims        - CW   / ?   (div)</option>
						<option>Whull        - CW   / ?   (div)</option>
						<option>Brown        - CW   / ?   (div)</option>
						<option>Krems        - CW   / ?   (div)</option>
						<option>Neely        - CW   / ?   (div)</option>
						<option>Sradac       - CW   / ELE (exl)</option>
						<option>Gohcourt     - CW   / ?   (div)</option>
						<option>Leroux       - CW   / PLT (exl)</option>
						<option>Murphy       - CW   / ?   (div)</option>
						<option>Vickers      - CW   / MW  (exl)</option>
						<option>Conners      - CW   / ALL (exl)</option>
						<option>Dubczeck     - CW   / ?   (div)</option>
						<option>Sanders      - CW   / ?   (div)</option>
						<option>Torc         - CW   / ?   (div)</option>
						<option>Ch`in        - CW   / PLT (exl)</option>
						<option>Dannvers     - CW   / ?   (div)</option>
						<option>Kell         - CWiE / ?   (exl)</option>
						<option>Mannix       - CCC  / ELE (exl)</option>
						<option>McCloud      - CCC  / ?   (div)</option>
						<option>Telinov      - CCC  / MW  (exl)</option>
						<option>Zeira        - CCC  / ?   (div)</option>
						<option>Eaker        - CCC  / PLT (exl)</option>
						<option>Hobbes       - CCC  / PLT (exl)</option>
						<option>Kaczuk       - CCC  / ?   (div)</option>
						<option>Khatib       - CCC  / ALL (exl)</option>
						<option>Bar-Fetstein - CCC  / ?   (div)</option>
						<option>Beckett      - CCC  / ALL (exl)</option>
						<option>Andersen     - CCC  / ?   (div)</option>
						<option>Morales      - CCC  / MW  (exl)</option>
						<option>Jamal        - CCC  / ?   (div)</option>
						<option>Quong        - CCC  / ELE (exl)</option>
						<option>Riaz         - CCC  / MW  (exl)</option>
						<option>Steiner      - CCC  / ALL (exl)</option>
						<option>Turiza       - CCC  / ?   (div)</option>
						<option>Hedemeyer    - CCC  / ?   (div)</option>
						<option>Kardaan      - CCC  / PLT (exl)</option>
						<option>Spaatz       - CCC  / PLT (exl)</option>
						<option>McEvedy      - CWV  / ?   (ann)</option>
						<option>Hallis       - CWV  / ?   (ann)</option>
						<option>Guidice      - CSA  / ALL (exl)</option>
						<option>Linn         - CSA  / MW  (exl)</option>
						<option>Moreau       - CSA  / PLT (exl)</option>
						<option>Reisch       - CSA  / ?   (div)</option>
						<option>Cathis       - CSA  / ?   (div)</option>
						<option>Gaiba        - CSA  / ?   (div)</option>
						<option>Lahiri       - CSA  / PLT (exl)</option>
						<option>Nguyi        - CSA  / ?   (div)</option>
						<option>Opriq        - CSA  / ELE (exl)</option>
						<option>Connery      - CSA  / ?   (div)</option>
						<option>Gena         - CSA  / PLT (exl)</option>
						<option>Hallik       - CSA  / ?   (div)</option>
						<option>Mikino       - CSA  / ?   (div)</option>
						<option>N`Buta       - CSA  / MW  (exl)</option>
						<option>Van Houten   - CSA  / MW  (exl)</option>
						<option>Marghar      - CSA  / ALL (exl)</option>
						<option>Taglieri     - CSA  / ?   (div)</option>
						<option>Turgidson    - CSA  / ALL (exl)</option>
						<option>Columbo      - CSA  / PLT (exl)</option>
						<option>Earle        - CSA  / ?   (div)</option>
						<option>Lamongue     - CSA  / MW  (exl)</option>
						<option>Meytani      - CSA  / ?   (div)</option>
						<option>Polczyk      - CSA  / ALL (exl)</option>
						<option>Banacek      - CSA  / ALL (exl)</option>
						<option>Cannon       - CSA  / ELE (exl)</option>
						<option>Daniels      - CSA  / ?   (div)</option>
						<option>Le Fabre     - CSA  / MW  (exl)</option>
						<option>McMillan     - CSA  / ELE (exl)</option>
						<option>Peck         - CSA  / ?   (div)</option>
						<option>Truscott     - CSA  / MW  (exl)</option>
						<option>Nga          - CSA  / PLT (exl)</option>
						<option>Paik         - CSA  / PLT (exl)</option>
						<option>Phoushath    - CSA  / ?   (div)</option>
						<option>Shi-Lu       - CSA  / ?   (div)</option>
						<option>Talasko      - CSA  / ALL (exl)</option>
						<option>Gastopiv     - CSA  / ALL (exl)</option>
						<option>Holliday     - CSA  / ELE (exl)</option>
						<option>Hutchinson   - CSA  / ALL (exl)</option>
						<option>Andersen     - CSA  / ?   (div)</option>
						<option>Dumont       - CSV  / ?   (div)</option>
						<option>Cochraine    - CSV  / PLT (exl)</option>
						<option>Masters      - CSV  / PLT (exl)</option>
						<option>Mercer       - CSV  / MW  (exl)</option>
						<option>Tamm         - CSV  / PLT (exl)</option>
						<option>Breen        - CSV  / ALL (exl)</option>
						<option>Chapman      - CSV  / ELE (exl)</option>
						<option>Grimani      - CSV  / ELE (exl)</option>
						<option>Andrews      - CSV  / MW  (exl)</option>
						<option>Moffat       - CSV  / MW  (exl)</option>
						<option>Zalman       - CSV  / ALL (exl)</option>
						<option>Ahmed        - CSV  / MW  (exl)</option>
						<option>Roland       - CSV  / ELE (exl)</option>
						<option>Sinclair     - CSR  / ?   (div)</option>
						<option>Crow         - CSR  / ALL (exl)</option>
						<option>Harper       - CSR  / ELE (exl)</option>
						<option>Siegel       - CSR  / ALL (exl)</option>
						<option>Sukhanov     - CSR  / MAR (exl)</option>
						<option>Bukannon     - CSR  / ?   (div)</option>
						<option>Howe         - CSR  / ALL (exl)</option>
						<option>McCorkell    - CSR  / MW  (exl)</option>
						<option>Quesnel      - CSR  / ?   (div)</option>
						<option>Roul         - CSR  / ?   (div)</option>
						<option>Zukov        - CSR  / ?   (div)</option>
						<option>Ahmad        - CSR  / ?   (div)</option>
						<option>D`Amone      - CSR  / ?   (div)</option>
						<option>Hakimi       - CSR  / ?   (div)</option>
						<option>Kinnison     - CSR  / ?   (ann)</option>
						<option>Matthews     - CSR  / ?   (div)</option>
						<option>Patrick      - CSR  / ?   (div)</option>
						<option>Shu          - CSR  / PLT (exl)</option>
						<option>Cooper       - CSR  / PLT (exl)</option>
						<option>Gerard       - CSR  / ?   (div)</option>
						<option>Hartford     - CSR  / ?   (div)</option>
						<option>Reinhold     - CSR  / ?   (div)</option>
						<option>Varga        - CSR  / ?   (div)</option>
						<option>Hand         - CSR  / ?   (div)</option>
						<option>Howell       - CSR  / ?   (div)</option>
						<option>McDougall    - CSR  / ?   (div)</option>
						<option>Running-Elk  - CSR  / ?   (div)</option>
						<option>Thibaudeau   - CSR  / ?   (div)</option>
						<option>Waters       - CSR  / ?   (div)</option>
						<option>Callaghan    - CSR  / ?   (div)</option>
						<option>Chand        - CSR  / ELE (exl)</option>
						<option>deMarque     - CSR  / ?   (div)</option>
						<option>Lanknau      - CSR  / MAR (exl)</option>
						<option>Magnus       - CSR  / MW  (exl)</option>
						<option>McKenna      - CSR  / ALL (exl)</option>
						<option>Patterson    - CSR  / ?   (div)</option>
						<option>Stoklas      - CSR  / ?   (div)</option>
						<option>Higali       - CNC  / ?   (div)</option>
						<option>Lenardon     - CNC  / ELE (exl)</option>
						<option>Rosse        - CNC  / MW  (exl)</option>
						<option>Winters      - CNC  / ELE (exl)</option>
						<option>Kostas       - CNC  / ?   (div)</option>
						<option>West         - CNC  / ELE (exl)</option>
						<option>Nostra       - CNC  / MW  (exl)</option>
						<option>Leroux       - CNC  / PLT (exl)</option>
						<option>Morris       - CNC  / ?   (div)</option>
						<option>Drummond     - CNC  / MW  (exl)</option>
						<option>Hardo        - CNC  / ?   (div)</option>
						<option>Gritas       - CNC  / ?   (div)</option>
						<option>Bavros       - CNC  / PLT (exl)</option>
						<option>Bullin       - CNC  / ?   (div)</option>
						<option>Deleportas   - CNC  / ALL (exl)</option>
						<option>Lossey       - CNC  / MW  (exl)</option>
						<option>Devalis      - CNC  / ALL (exl)</option>
						<option>Nevvarsan    - CSJ  / ELE (ann)</option>
						<option>Osis         - CSJ  / MW  (ann)</option>
						<option>Perez        - CSJ  / ELE (ann)</option>
						<option>Levi         - CSJ  / ?   (div)</option>
						<option>Montizima    - CSJ  / ?   (div)</option>
						<option>Showers      - CSJ  / MW  (ann)</option>
						<option>Stiles       - CSJ  / PLT (ann)</option>
						<option>Wimmer       - CSJ  / MW  (ann)</option>
						<option>Hildenrath   - CSJ  / ?   (div)</option>
						<option>Wirth        - CSJ  / MW  (ann)</option>
						<option>Kotare       - CSJ  / ALL (ann)</option>
						<option>DesCastris   - CSJ  / ?   (div)</option>
						<option>Chrisholm    - CSJ  / PLT (ann)</option>
						<option>Furey        - CSJ  / ALL (ann)</option>
						<option>Bowen        - CSJ  / ?   (div)</option>
						<option>Moon         - CSJ  / ELE (ann)</option>
						<option>Irons        - CJF  / ?   (div)</option>
						<option>Pyre         - CJF  / ?   (div)</option>
						<option>Vargras      - CJF  / ?   (div)</option>
						<option>Anu          - CJF  / ?   (div)</option>
						<option>Gorga        - CJF  / ?   (div)</option>
						<option>Huddock      - CJF  / ?   (div)</option>
						<option>Lovonski     - CJF  / ?   (div)</option>
						<option>Solomon      - CJF  / ?   (div)</option>
						<option>Viola        - CJF  / ?   (div)</option>
						<option>Chrichell    - CJF  / ?   (ann)</option>
						<option>Eodrap       - CJF  / ?   (div)</option>
						<option>Folkner      - CJF  / ?   (div)</option>
						<option>Icaza        - CJF  / ELE (exl)</option>
						<option>Mattlov      - CJF  / ELE (exl)</option>
						<option>Prentice     - CJF  / ?   (div)</option>
						<option>Regner       - CJF  / ?   (div)</option>
						<option>Spaunn       - CJF  / ?   (div)</option>
						<option>Von Jankmon  - CJF  / PLT (exl)</option>
						<option>Yung         - CJF  / ?   (div)</option>
						<option>Chistu       - CJF  / ALL (exl)</option>
						<option>Gulli        - CJF  / ?   (div)</option>
						<option>Isha         - CJF  / ?   (div)</option>
						<option>Kyle         - CJF  / ?   (div)</option>
						<option>Newclay      - CJF  / ?   (div)</option>
						<option>Ott          - CJF  / ?   (div)</option>
						<option>Pershaw      - CJF  / ?   (div)</option>
						<option>Thastus      - CJF  / PLT (exl)</option>
						<option>Chan         - CJF  / ?   (div)</option>
						<option>Chu-Li       - CJF  / ?   (div)</option>
						<option>Fischer      - CJF  / ?   (div)</option>
						<option>Hazen        - CJF  / ALL (exl)</option>
						<option>Oriega       - CJF  / ?   (div)</option>
						<option>Sonoma       - CJF  / ?   (div)</option>
						<option>Cha-Regner   - CJF  / ?   (div)</option>
						<option>Fore         - CJF  / ?   (div)</option>
						<option>Helmer       - CJF  / MW  (exl)</option>
						<option>Iler         - CJF  / ?   (div)</option>
						<option>Malthus      - CJF  / ALL (exl)</option>
						<option>McCaig       - CJF  / ?   (div)</option>
						<option>Pryde        - CJF  / MW  (exl)</option>
						<option>Roshak       - CJF  / MW  (exl)</option>
						<option>Shambag      - CJF  / ?   (div)</option>
						<option>Sustan       - CJF  / ?   (div)</option>
						<option>Drake        - CJF  / ?   (div)</option>
						<option>Eagle        - CJF  / ?   (div)</option>
						<option>Feng         - CJF  / ?   (div)</option>
						<option>Oberg        - CJF  / ?   (div)</option>
						<option>Zywot        - CJF  / ?   (div)</option>
						<option>Redmond      - CJF  / ?   (div)</option>
						<option>Shu-Li       - CJF  / ?   (div)</option>
						<option>Uston        - CJF  / ?   (div)</option>
						<option>Yont         - CJF  / ?   (div)</option>
						<option>Bang-Chu     - CJF  / ?   (div)</option>
						<option>Binetti      - CJF  / PLT (exl)</option>
						<option>Buhallin     - CJF  / MW  (exl)</option>
						<option>Clees        - CJF  / ?   (div)</option>
						<option>Houan        - CHH  / ELE (exl)</option>
						<option>Johnston     - CHH  / PLT (exl)</option>
						<option>Seidman      - CHH  / ELE (exl)</option>
						<option>Amirault     - CHH  / MW  (exl)</option>
						<option>Dudzinsky    - CHH  / PLT (exl)</option>
						<option>Lassenerra   - CHH  / MW  (exl)</option>
						<option>DeLaurel     - CHH  / ALL (exl)</option>
						<option>Dwelley      - CHH  / PLT (exl)</option>
						<option>Ravenwater   - CHH  / MW  (exl)</option>
						<option>Mitchell     - CHH  / MW  (exl)</option>
						<option>Cobb         - CHH  / ALL (exl)</option>
						<option>Fletcher     - CHH  / ELE (exl)</option>
						<option>Cooper       - CHH  / ELE (exl)</option>
						<option>Dinour       - CGS  / ALL (exl)</option>
						<option>Suvorov      - CGS  / PLT (exl)</option>
						<option>Myers        - CGS  / MW  (exl)</option>
						<option>Baba         - CGS  / ELE (exl)</option>
						<option>Ben-Shimon   - CGS  / PLT (exl)</option>
						<option>Sargon       - CGS  / ?   (div)</option>
						<option>Shaffer      - CGS  / ELE (exl)</option>
						<option>Djerassi     - CGS  / ELE (exl)</option>
						<option>Arbuthnot    - CGS  / MW  (exl)</option>
						<option>Yeh          - CGS  / MW  (exl)</option>
						<option>Scott        - CGS  / ALL (exl)</option>
						<option>ar-Rashid    - CGS  / ?   (div)</option>
						<option>Elam         - CGS  / ALL (exl)</option>
						<option>Kirov        - CGS  / ALL (exl)</option>
						<option>Posavatz     - CGS  / MW  (exl)</option>
						<option>Hasbrin      - CIH  / PLT (exl)</option>
						<option>Hawkins      - CIH  / ?   (div)</option>
						<option>Hordwon      - CIH  / MW  (exl)</option>
						<option>Moore        - CIH  / ELE (exl)</option>
						<option>Rood         - CIH  / ALL (exl)</option>
						<option>Taney        - CIH  / ALL (exl)</option>
						<option>Cage         - CIH  / ALL (exl)</option>
						<option>Montose      - CIH  / ELE (exl)</option>
						<option>Norizuchi    - CIH  / MW  (exl)</option>
						<option>Tyler        - CIH  / PLT (exl)</option>
						<option>Klien        - CIH  / MW  (exl)</option>
						<option>Lienet       - CIH  / MW  (exl)</option>
						<option>Wick         - CIH  / MW  (exl)</option>
						<option>Forrester    - CGB  / ?   (div)</option>
						<option>Hambash      - CGB  / ?   (div)</option>
						<option>Mitshan      - CGB  / ?   (div)</option>
						<option>Nuyriev      - CGB  / ?   (div)</option>
						<option>Tseng        - CGB  / MW  (exl)</option>
						<option>Bazso        - CGB  / ?   (div)</option>
						<option>Hakimi       - CGB  / ?   (div)</option>
						<option>Hannifan     - CGB  / ?   (div)</option>
						<option>Gilmour      - CGB  / PLT (exl)</option>
						<option>Jorgensson   - CGB  / MW  (exl)</option>
						<option>Bourjon      - CGB  / PLT (exl)</option>
						<option>DelVillar    - CGB  / ELE (exl)</option>
						<option>Huntsig      - CGB  / ?   (div)</option>
						<option>Silva        - CGB  / ?   (div)</option>
						<option>Vong         - CGB  / ELE (exl)</option>
						<option>Cote         - CGB  / ?   (div)</option>
						<option>Devon        - CGB  / PLT (exl)</option>
						<option>Gurdel       - CGB  / ALL (exl)</option>
						<option>Hawkins      - CGB  / ?   (div)</option>
						<option>Kabrinski    - CGB  / ELE (exl)</option>
						<option>Memba        - CGB  / ?   (div)</option>
						<option>Momaovi      - CGB  / ?   (div)</option>
						<option>Snuka        - CGB  / ALL (exl)</option>
						<option>Bekker       - CGB  / MW  (exl)</option>
						<option>Hall         - CGB  / MW  (exl)</option>
						<option>Harlow       - CGB  / ?   (div)</option>
						<option>Ortiz        - CGB  / ?   (div)</option>
						<option>Vishio       - CGB  / ?   (div)</option>
						<option>Faraday      - CFM  / ALL (exl)</option>
						<option>Kline        - CFM  / MW  (exl)</option>
						<option>Bush         - CFM  / ?   (div)</option>
						<option>Jannik       - CFM  / MW  (exl)</option>
						<option>Sainze       - CFM  / ALL (exl)</option>
						<option>Danforth     - CFM  / ?   (div)</option>
						<option>Jewel        - CFM  / ?   (div)</option>
						<option>Kreese       - CFM  / PLT (exl)</option>
						<option>Payne        - CFM  / MW  (exl)</option>
						<option>Lopez        - CFM  / ELE (exl)</option>
						<option>Smythe       - CFM  / ?   (div)</option>
						<option>Goulet       - CFM  / ELE (exl)</option>
						<option>Lynn         - CFM  / PLT (exl)</option>
						<option>Beyl         - CFM  / PLT (exl)</option>
						<option>Angharobis   - CFM  / ?   (div)</option>
						<option>Carrol       - CFM  / ALL (exl)</option>
						<option>Komolosi     - CFM  / ?   (div)</option>
						<option>Xing         - CFM  / ?   (div)</option>
						<option>Grant        - CFM  / ?   (div)</option>
						<option>Mattila      - CFM  / ALL (exl)</option>
						<option>Mick         - CFM  / ELE (exl)</option>
						<option>Tanaga       - CFM  / MW  (exl)</option>
						<option>Ghiberti     - CDS  / ?   (div)</option>
						<option>Borghev      - CDS  / ?   (div)</option>
						<option>Clarke       - CDS  / ALL (exl)</option>
						<option>Maine        - CDS  / ELE (exl)</option>
						<option>Coston       - CDS  / ELE (exl)</option>
						<option>Faulk        - CDS  / PLT (exl)</option>
						<option>Fowler       - CDS  / PLT (exl)</option>
						<option>Hammond      - CDS  / MW  (exl)</option>
						<option>Hawker       - CDS  / MW  (exl)</option>
						<option>Schtern      - CDS  / ?   (div)</option>
						<option>Vewas        - CDS  / ELE (exl)</option>
						<option>Kalasa       - CDS  / ALL (exl)</option>
						<option>Nagasawa     - CDS  / PLT (exl)</option>
						<option>Rodriguez    - CDS  / MW  (exl)</option>
						<option>Erikson      - CDS  / ?   (div)</option>
						<option>Horn         - CDS  / ELE (exl)</option>
						<option>Oshika       - CDS  / ELE (exl)</option>
						<option>Labov        - CDS  / ?   (div)</option>
						<option>Sennet       - CDS  / MW  (exl)</option>
						<option>Kufahl       - CCY  / ?   (div)</option>
						<option>McTighe      - CCY  / PLT (exl)</option>
						<option>Starskiy     - CCY  / ?   (div)</option>
						<option>Drewsivitch  - CCY  / ?   (div)</option>
						<option>Heller       - CCY  / ELE (exl)</option>
						<option>McKibben     - CCY  / ?   (div)</option>
						<option>Koga         - CCY  / MW  (exl)</option>
						<option>Steele       - CCY  / ALL (exl)</option>
						<option>Hoffman      - CCY  / ?   (div)</option>
						<option>Levien       - CCY  / PLT (exl)</option>
						<option>Tamzarian    - CCY  / ?   (div)</option>
						<option>Topol        - CCY  / ?   (div)</option>
						<option>Clearwater   - CCY  / ?   (div)</option>
						<option>Nuriev       - CCY  / ?   (div)</option>
						<option>Tchernovkov  - CCY  / ALL (exl)</option>
						<option>Hill         - CCY  / ?   (div)</option>
						<option>Markopolous  - CCY  / ?   (div)</option>
						<option>Danforth     - CCY  / ?   (div)</option>
						<option>Jerricho     - CCY  / MW  (exl)</option>
						<option>Kozyrev      - CCY  / ?   (div)</option>
						<option>Levine       - CCY  / ?   (div)</option>
						<option>Nash         - CCY  / ALL (exl)</option>
						<option>Chu          - CBS  / ?   (div)</option>
						<option>DeLuca       - CBS  / ?   (div)</option>
						<option>Pitcher      - CBS  / ELE (exl)</option>
						<option>Yanez        - CBS  / ELE (exl)</option>
						<option>Campbell     - CBS  / ALL (exl)</option>
						<option>Lewis        - CBS  / MW  (exl)</option>
						<option>Osborne      - CBS  / ?   (div)</option>
						<option>Blackburn    - CBS  / ?   (div)</option>
						<option>Cluff        - CBS  / ELE (exl)</option>
						<option>Galen        - CBS  / ?   (div)</option>
						<option>McFadden     - CBS  / PLT (exl)</option>
						<option>Vishio       - CBS  / ?   (div)</option>
						<option>Dumont       - CBS  / ?   (div)</option>
						<option>Johns        - CBS  / PLT (exl)</option>
						<option>Keller       - CBS  / MW  (exl)</option>
						<option>Schmitt      - CBS  / MW  (exl)</option>
						<option>Winson       - CBS  / ?   (div)</option>
						<option>Boques       - CBS  / ALL (exl)</option>
						<option>Church       - CBS  / MW  (exl)</option>
						<option>Noruff       - CBS  / ?   (div)</option>
						<option>Carmichael   - CBS  / ?   (div)</option>
				</select></td>
				<td align='right'><?= $_t->translate("8140") ?>:</td>
				<td align='left'><select id='spieler2_bluthaus' onchange='valueChanged();' class='select'
					name='spieler2_bluthaus' size='1' style='width: 150px;'>
						<option>--- <?= $_t->translate("8150") ?> ---</option>
						<option>Kerensky     - CW   / ALL (exl)</option>
						<option>Ward         - CW   / MW  (exl)</option>
						<option>Kemp         - CW   / ?   (div)</option>
						<option>Schroeder    - CW   / ?   (div)</option>
						<option>Shaw         - CW   / ELE (exl)</option>
						<option>Wallace      - CW   / ?   (div)</option>
						<option>Fetladral    - CW   / ALL (exl)</option>
						<option>Parker       - CW   / ?   (div)</option>
						<option>Radick       - CW   / MW  (exl)</option>
						<option>Richardson   - CW   / ?   (div)</option>
						<option>Tinn         - CW   / ?   (div)</option>
						<option>Tutuola      - CW   / ELE (exl)</option>
						<option>Demos        - CW   / ?   (div)</option>
						<option>Kissiel      - CW   / ?   (div)</option>
						<option>Torshi       - CW   / ?   (div)</option>
						<option>Carns        - CW   / MW  (exl)</option>
						<option>DeVega       - CW   / ?   (div)</option>
						<option>Kerderk      - CW   / ?   (div)</option>
						<option>Mehta        - CW   / PLT (exl)</option>
						<option>Nygren       - CW   / ?   (div)</option>
						<option>Rhyde        - CW   / PLT (exl)</option>
						<option>Sherbow      - CW   / ?   (div)</option>
						<option>Jennings     - CW   / ?   (div)</option>
						<option>Saline       - CW   / ?   (div)</option>
						<option>Sender       - CW   / MW  (exl)</option>
						<option>Stims        - CW   / ?   (div)</option>
						<option>Whull        - CW   / ?   (div)</option>
						<option>Brown        - CW   / ?   (div)</option>
						<option>Krems        - CW   / ?   (div)</option>
						<option>Neely        - CW   / ?   (div)</option>
						<option>Sradac       - CW   / ELE (exl)</option>
						<option>Gohcourt     - CW   / ?   (div)</option>
						<option>Leroux       - CW   / PLT (exl)</option>
						<option>Murphy       - CW   / ?   (div)</option>
						<option>Vickers      - CW   / MW  (exl)</option>
						<option>Conners      - CW   / ALL (exl)</option>
						<option>Dubczeck     - CW   / ?   (div)</option>
						<option>Sanders      - CW   / ?   (div)</option>
						<option>Torc         - CW   / ?   (div)</option>
						<option>Ch`in        - CW   / PLT (exl)</option>
						<option>Dannvers     - CW   / ?   (div)</option>
						<option>Kell         - CWiE / ?   (exl)</option>
						<option>Mannix       - CCC  / ELE (exl)</option>
						<option>McCloud      - CCC  / ?   (div)</option>
						<option>Telinov      - CCC  / MW  (exl)</option>
						<option>Zeira        - CCC  / ?   (div)</option>
						<option>Eaker        - CCC  / PLT (exl)</option>
						<option>Hobbes       - CCC  / PLT (exl)</option>
						<option>Kaczuk       - CCC  / ?   (div)</option>
						<option>Khatib       - CCC  / ALL (exl)</option>
						<option>Bar-Fetstein - CCC  / ?   (div)</option>
						<option>Beckett      - CCC  / ALL (exl)</option>
						<option>Andersen     - CCC  / ?   (div)</option>
						<option>Morales      - CCC  / MW  (exl)</option>
						<option>Jamal        - CCC  / ?   (div)</option>
						<option>Quong        - CCC  / ELE (exl)</option>
						<option>Riaz         - CCC  / MW  (exl)</option>
						<option>Steiner      - CCC  / ALL (exl)</option>
						<option>Turiza       - CCC  / ?   (div)</option>
						<option>Hedemeyer    - CCC  / ?   (div)</option>
						<option>Kardaan      - CCC  / PLT (exl)</option>
						<option>Spaatz       - CCC  / PLT (exl)</option>
						<option>McEvedy      - CWV  / ?   (ann)</option>
						<option>Hallis       - CWV  / ?   (ann)</option>
						<option>Guidice      - CSA  / ALL (exl)</option>
						<option>Linn         - CSA  / MW  (exl)</option>
						<option>Moreau       - CSA  / PLT (exl)</option>
						<option>Reisch       - CSA  / ?   (div)</option>
						<option>Cathis       - CSA  / ?   (div)</option>
						<option>Gaiba        - CSA  / ?   (div)</option>
						<option>Lahiri       - CSA  / PLT (exl)</option>
						<option>Nguyi        - CSA  / ?   (div)</option>
						<option>Opriq        - CSA  / ELE (exl)</option>
						<option>Connery      - CSA  / ?   (div)</option>
						<option>Gena         - CSA  / PLT (exl)</option>
						<option>Hallik       - CSA  / ?   (div)</option>
						<option>Mikino       - CSA  / ?   (div)</option>
						<option>N`Buta       - CSA  / MW  (exl)</option>
						<option>Van Houten   - CSA  / MW  (exl)</option>
						<option>Marghar      - CSA  / ALL (exl)</option>
						<option>Taglieri     - CSA  / ?   (div)</option>
						<option>Turgidson    - CSA  / ALL (exl)</option>
						<option>Columbo      - CSA  / PLT (exl)</option>
						<option>Earle        - CSA  / ?   (div)</option>
						<option>Lamongue     - CSA  / MW  (exl)</option>
						<option>Meytani      - CSA  / ?   (div)</option>
						<option>Polczyk      - CSA  / ALL (exl)</option>
						<option>Banacek      - CSA  / ALL (exl)</option>
						<option>Cannon       - CSA  / ELE (exl)</option>
						<option>Daniels      - CSA  / ?   (div)</option>
						<option>Le Fabre     - CSA  / MW  (exl)</option>
						<option>McMillan     - CSA  / ELE (exl)</option>
						<option>Peck         - CSA  / ?   (div)</option>
						<option>Truscott     - CSA  / MW  (exl)</option>
						<option>Nga          - CSA  / PLT (exl)</option>
						<option>Paik         - CSA  / PLT (exl)</option>
						<option>Phoushath    - CSA  / ?   (div)</option>
						<option>Shi-Lu       - CSA  / ?   (div)</option>
						<option>Talasko      - CSA  / ALL (exl)</option>
						<option>Gastopiv     - CSA  / ALL (exl)</option>
						<option>Holliday     - CSA  / ELE (exl)</option>
						<option>Hutchinson   - CSA  / ALL (exl)</option>
						<option>Andersen     - CSA  / ?   (div)</option>
						<option>Dumont       - CSV  / ?   (div)</option>
						<option>Cochraine    - CSV  / PLT (exl)</option>
						<option>Masters      - CSV  / PLT (exl)</option>
						<option>Mercer       - CSV  / MW  (exl)</option>
						<option>Tamm         - CSV  / PLT (exl)</option>
						<option>Breen        - CSV  / ALL (exl)</option>
						<option>Chapman      - CSV  / ELE (exl)</option>
						<option>Grimani      - CSV  / ELE (exl)</option>
						<option>Andrews      - CSV  / MW  (exl)</option>
						<option>Moffat       - CSV  / MW  (exl)</option>
						<option>Zalman       - CSV  / ALL (exl)</option>
						<option>Ahmed        - CSV  / MW  (exl)</option>
						<option>Roland       - CSV  / ELE (exl)</option>
						<option>Sinclair     - CSR  / ?   (div)</option>
						<option>Crow         - CSR  / ALL (exl)</option>
						<option>Harper       - CSR  / ELE (exl)</option>
						<option>Siegel       - CSR  / ALL (exl)</option>
						<option>Sukhanov     - CSR  / MAR (exl)</option>
						<option>Bukannon     - CSR  / ?   (div)</option>
						<option>Howe         - CSR  / ALL (exl)</option>
						<option>McCorkell    - CSR  / MW  (exl)</option>
						<option>Quesnel      - CSR  / ?   (div)</option>
						<option>Roul         - CSR  / ?   (div)</option>
						<option>Zukov        - CSR  / ?   (div)</option>
						<option>Ahmad        - CSR  / ?   (div)</option>
						<option>D`Amone      - CSR  / ?   (div)</option>
						<option>Hakimi       - CSR  / ?   (div)</option>
						<option>Kinnison     - CSR  / ?   (ann)</option>
						<option>Matthews     - CSR  / ?   (div)</option>
						<option>Patrick      - CSR  / ?   (div)</option>
						<option>Shu          - CSR  / PLT (exl)</option>
						<option>Cooper       - CSR  / PLT (exl)</option>
						<option>Gerard       - CSR  / ?   (div)</option>
						<option>Hartford     - CSR  / ?   (div)</option>
						<option>Reinhold     - CSR  / ?   (div)</option>
						<option>Varga        - CSR  / ?   (div)</option>
						<option>Hand         - CSR  / ?   (div)</option>
						<option>Howell       - CSR  / ?   (div)</option>
						<option>McDougall    - CSR  / ?   (div)</option>
						<option>Running-Elk  - CSR  / ?   (div)</option>
						<option>Thibaudeau   - CSR  / ?   (div)</option>
						<option>Waters       - CSR  / ?   (div)</option>
						<option>Callaghan    - CSR  / ?   (div)</option>
						<option>Chand        - CSR  / ELE (exl)</option>
						<option>deMarque     - CSR  / ?   (div)</option>
						<option>Lanknau      - CSR  / MAR (exl)</option>
						<option>Magnus       - CSR  / MW  (exl)</option>
						<option>McKenna      - CSR  / ALL (exl)</option>
						<option>Patterson    - CSR  / ?   (div)</option>
						<option>Stoklas      - CSR  / ?   (div)</option>
						<option>Higali       - CNC  / ?   (div)</option>
						<option>Lenardon     - CNC  / ELE (exl)</option>
						<option>Rosse        - CNC  / MW  (exl)</option>
						<option>Winters      - CNC  / ELE (exl)</option>
						<option>Kostas       - CNC  / ?   (div)</option>
						<option>West         - CNC  / ELE (exl)</option>
						<option>Nostra       - CNC  / MW  (exl)</option>
						<option>Leroux       - CNC  / PLT (exl)</option>
						<option>Morris       - CNC  / ?   (div)</option>
						<option>Drummond     - CNC  / MW  (exl)</option>
						<option>Hardo        - CNC  / ?   (div)</option>
						<option>Gritas       - CNC  / ?   (div)</option>
						<option>Bavros       - CNC  / PLT (exl)</option>
						<option>Bullin       - CNC  / ?   (div)</option>
						<option>Deleportas   - CNC  / ALL (exl)</option>
						<option>Lossey       - CNC  / MW  (exl)</option>
						<option>Devalis      - CNC  / ALL (exl)</option>
						<option>Nevvarsan    - CSJ  / ELE (ann)</option>
						<option>Osis         - CSJ  / MW  (ann)</option>
						<option>Perez        - CSJ  / ELE (ann)</option>
						<option>Levi         - CSJ  / ?   (div)</option>
						<option>Montizima    - CSJ  / ?   (div)</option>
						<option>Showers      - CSJ  / MW  (ann)</option>
						<option>Stiles       - CSJ  / PLT (ann)</option>
						<option>Wimmer       - CSJ  / MW  (ann)</option>
						<option>Hildenrath   - CSJ  / ?   (div)</option>
						<option>Wirth        - CSJ  / MW  (ann)</option>
						<option>Kotare       - CSJ  / ALL (ann)</option>
						<option>DesCastris   - CSJ  / ?   (div)</option>
						<option>Chrisholm    - CSJ  / PLT (ann)</option>
						<option>Furey        - CSJ  / ALL (ann)</option>
						<option>Bowen        - CSJ  / ?   (div)</option>
						<option>Moon         - CSJ  / ELE (ann)</option>
						<option>Irons        - CJF  / ?   (div)</option>
						<option>Pyre         - CJF  / ?   (div)</option>
						<option>Vargras      - CJF  / ?   (div)</option>
						<option>Anu          - CJF  / ?   (div)</option>
						<option>Gorga        - CJF  / ?   (div)</option>
						<option>Huddock      - CJF  / ?   (div)</option>
						<option>Lovonski     - CJF  / ?   (div)</option>
						<option>Solomon      - CJF  / ?   (div)</option>
						<option>Viola        - CJF  / ?   (div)</option>
						<option>Chrichell    - CJF  / ?   (ann)</option>
						<option>Eodrap       - CJF  / ?   (div)</option>
						<option>Folkner      - CJF  / ?   (div)</option>
						<option>Icaza        - CJF  / ELE (exl)</option>
						<option>Mattlov      - CJF  / ELE (exl)</option>
						<option>Prentice     - CJF  / ?   (div)</option>
						<option>Regner       - CJF  / ?   (div)</option>
						<option>Spaunn       - CJF  / ?   (div)</option>
						<option>Von Jankmon  - CJF  / PLT (exl)</option>
						<option>Yung         - CJF  / ?   (div)</option>
						<option>Chistu       - CJF  / ALL (exl)</option>
						<option>Gulli        - CJF  / ?   (div)</option>
						<option>Isha         - CJF  / ?   (div)</option>
						<option>Kyle         - CJF  / ?   (div)</option>
						<option>Newclay      - CJF  / ?   (div)</option>
						<option>Ott          - CJF  / ?   (div)</option>
						<option>Pershaw      - CJF  / ?   (div)</option>
						<option>Thastus      - CJF  / PLT (exl)</option>
						<option>Chan         - CJF  / ?   (div)</option>
						<option>Chu-Li       - CJF  / ?   (div)</option>
						<option>Fischer      - CJF  / ?   (div)</option>
						<option>Hazen        - CJF  / ALL (exl)</option>
						<option>Oriega       - CJF  / ?   (div)</option>
						<option>Sonoma       - CJF  / ?   (div)</option>
						<option>Cha-Regner   - CJF  / ?   (div)</option>
						<option>Fore         - CJF  / ?   (div)</option>
						<option>Helmer       - CJF  / MW  (exl)</option>
						<option>Iler         - CJF  / ?   (div)</option>
						<option>Malthus      - CJF  / ALL (exl)</option>
						<option>McCaig       - CJF  / ?   (div)</option>
						<option>Pryde        - CJF  / MW  (exl)</option>
						<option>Roshak       - CJF  / MW  (exl)</option>
						<option>Shambag      - CJF  / ?   (div)</option>
						<option>Sustan       - CJF  / ?   (div)</option>
						<option>Drake        - CJF  / ?   (div)</option>
						<option>Eagle        - CJF  / ?   (div)</option>
						<option>Feng         - CJF  / ?   (div)</option>
						<option>Oberg        - CJF  / ?   (div)</option>
						<option>Zywot        - CJF  / ?   (div)</option>
						<option>Redmond      - CJF  / ?   (div)</option>
						<option>Shu-Li       - CJF  / ?   (div)</option>
						<option>Uston        - CJF  / ?   (div)</option>
						<option>Yont         - CJF  / ?   (div)</option>
						<option>Bang-Chu     - CJF  / ?   (div)</option>
						<option>Binetti      - CJF  / PLT (exl)</option>
						<option>Buhallin     - CJF  / MW  (exl)</option>
						<option>Clees        - CJF  / ?   (div)</option>
						<option>Houan        - CHH  / ELE (exl)</option>
						<option>Johnston     - CHH  / PLT (exl)</option>
						<option>Seidman      - CHH  / ELE (exl)</option>
						<option>Amirault     - CHH  / MW  (exl)</option>
						<option>Dudzinsky    - CHH  / PLT (exl)</option>
						<option>Lassenerra   - CHH  / MW  (exl)</option>
						<option>DeLaurel     - CHH  / ALL (exl)</option>
						<option>Dwelley      - CHH  / PLT (exl)</option>
						<option>Ravenwater   - CHH  / MW  (exl)</option>
						<option>Mitchell     - CHH  / MW  (exl)</option>
						<option>Cobb         - CHH  / ALL (exl)</option>
						<option>Fletcher     - CHH  / ELE (exl)</option>
						<option>Cooper       - CHH  / ELE (exl)</option>
						<option>Dinour       - CGS  / ALL (exl)</option>
						<option>Suvorov      - CGS  / PLT (exl)</option>
						<option>Myers        - CGS  / MW  (exl)</option>
						<option>Baba         - CGS  / ELE (exl)</option>
						<option>Ben-Shimon   - CGS  / PLT (exl)</option>
						<option>Sargon       - CGS  / ?   (div)</option>
						<option>Shaffer      - CGS  / ELE (exl)</option>
						<option>Djerassi     - CGS  / ELE (exl)</option>
						<option>Arbuthnot    - CGS  / MW  (exl)</option>
						<option>Yeh          - CGS  / MW  (exl)</option>
						<option>Scott        - CGS  / ALL (exl)</option>
						<option>ar-Rashid    - CGS  / ?   (div)</option>
						<option>Elam         - CGS  / ALL (exl)</option>
						<option>Kirov        - CGS  / ALL (exl)</option>
						<option>Posavatz     - CGS  / MW  (exl)</option>
						<option>Hasbrin      - CIH  / PLT (exl)</option>
						<option>Hawkins      - CIH  / ?   (div)</option>
						<option>Hordwon      - CIH  / MW  (exl)</option>
						<option>Moore        - CIH  / ELE (exl)</option>
						<option>Rood         - CIH  / ALL (exl)</option>
						<option>Taney        - CIH  / ALL (exl)</option>
						<option>Cage         - CIH  / ALL (exl)</option>
						<option>Montose      - CIH  / ELE (exl)</option>
						<option>Norizuchi    - CIH  / MW  (exl)</option>
						<option>Tyler        - CIH  / PLT (exl)</option>
						<option>Klien        - CIH  / MW  (exl)</option>
						<option>Lienet       - CIH  / MW  (exl)</option>
						<option>Wick         - CIH  / MW  (exl)</option>
						<option>Forrester    - CGB  / ?   (div)</option>
						<option>Hambash      - CGB  / ?   (div)</option>
						<option>Mitshan      - CGB  / ?   (div)</option>
						<option>Nuyriev      - CGB  / ?   (div)</option>
						<option>Tseng        - CGB  / MW  (exl)</option>
						<option>Bazso        - CGB  / ?   (div)</option>
						<option>Hakimi       - CGB  / ?   (div)</option>
						<option>Hannifan     - CGB  / ?   (div)</option>
						<option>Gilmour      - CGB  / PLT (exl)</option>
						<option>Jorgensson   - CGB  / MW  (exl)</option>
						<option>Bourjon      - CGB  / PLT (exl)</option>
						<option>DelVillar    - CGB  / ELE (exl)</option>
						<option>Huntsig      - CGB  / ?   (div)</option>
						<option>Silva        - CGB  / ?   (div)</option>
						<option>Vong         - CGB  / ELE (exl)</option>
						<option>Cote         - CGB  / ?   (div)</option>
						<option>Devon        - CGB  / PLT (exl)</option>
						<option>Gurdel       - CGB  / ALL (exl)</option>
						<option>Hawkins      - CGB  / ?   (div)</option>
						<option>Kabrinski    - CGB  / ELE (exl)</option>
						<option>Memba        - CGB  / ?   (div)</option>
						<option>Momaovi      - CGB  / ?   (div)</option>
						<option>Snuka        - CGB  / ALL (exl)</option>
						<option>Bekker       - CGB  / MW  (exl)</option>
						<option>Hall         - CGB  / MW  (exl)</option>
						<option>Harlow       - CGB  / ?   (div)</option>
						<option>Ortiz        - CGB  / ?   (div)</option>
						<option>Vishio       - CGB  / ?   (div)</option>
						<option>Faraday      - CFM  / ALL (exl)</option>
						<option>Kline        - CFM  / MW  (exl)</option>
						<option>Bush         - CFM  / ?   (div)</option>
						<option>Jannik       - CFM  / MW  (exl)</option>
						<option>Sainze       - CFM  / ALL (exl)</option>
						<option>Danforth     - CFM  / ?   (div)</option>
						<option>Jewel        - CFM  / ?   (div)</option>
						<option>Kreese       - CFM  / PLT (exl)</option>
						<option>Payne        - CFM  / MW  (exl)</option>
						<option>Lopez        - CFM  / ELE (exl)</option>
						<option>Smythe       - CFM  / ?   (div)</option>
						<option>Goulet       - CFM  / ELE (exl)</option>
						<option>Lynn         - CFM  / PLT (exl)</option>
						<option>Beyl         - CFM  / PLT (exl)</option>
						<option>Angharobis   - CFM  / ?   (div)</option>
						<option>Carrol       - CFM  / ALL (exl)</option>
						<option>Komolosi     - CFM  / ?   (div)</option>
						<option>Xing         - CFM  / ?   (div)</option>
						<option>Grant        - CFM  / ?   (div)</option>
						<option>Mattila      - CFM  / ALL (exl)</option>
						<option>Mick         - CFM  / ELE (exl)</option>
						<option>Tanaga       - CFM  / MW  (exl)</option>
						<option>Ghiberti     - CDS  / ?   (div)</option>
						<option>Borghev      - CDS  / ?   (div)</option>
						<option>Clarke       - CDS  / ALL (exl)</option>
						<option>Maine        - CDS  / ELE (exl)</option>
						<option>Coston       - CDS  / ELE (exl)</option>
						<option>Faulk        - CDS  / PLT (exl)</option>
						<option>Fowler       - CDS  / PLT (exl)</option>
						<option>Hammond      - CDS  / MW  (exl)</option>
						<option>Hawker       - CDS  / MW  (exl)</option>
						<option>Schtern      - CDS  / ?   (div)</option>
						<option>Vewas        - CDS  / ELE (exl)</option>
						<option>Kalasa       - CDS  / ALL (exl)</option>
						<option>Nagasawa     - CDS  / PLT (exl)</option>
						<option>Rodriguez    - CDS  / MW  (exl)</option>
						<option>Erikson      - CDS  / ?   (div)</option>
						<option>Horn         - CDS  / ELE (exl)</option>
						<option>Oshika       - CDS  / ELE (exl)</option>
						<option>Labov        - CDS  / ?   (div)</option>
						<option>Sennet       - CDS  / MW  (exl)</option>
						<option>Kufahl       - CCY  / ?   (div)</option>
						<option>McTighe      - CCY  / PLT (exl)</option>
						<option>Starskiy     - CCY  / ?   (div)</option>
						<option>Drewsivitch  - CCY  / ?   (div)</option>
						<option>Heller       - CCY  / ELE (exl)</option>
						<option>McKibben     - CCY  / ?   (div)</option>
						<option>Koga         - CCY  / MW  (exl)</option>
						<option>Steele       - CCY  / ALL (exl)</option>
						<option>Hoffman      - CCY  / ?   (div)</option>
						<option>Levien       - CCY  / PLT (exl)</option>
						<option>Tamzarian    - CCY  / ?   (div)</option>
						<option>Topol        - CCY  / ?   (div)</option>
						<option>Clearwater   - CCY  / ?   (div)</option>
						<option>Nuriev       - CCY  / ?   (div)</option>
						<option>Tchernovkov  - CCY  / ALL (exl)</option>
						<option>Hill         - CCY  / ?   (div)</option>
						<option>Markopolous  - CCY  / ?   (div)</option>
						<option>Danforth     - CCY  / ?   (div)</option>
						<option>Jerricho     - CCY  / MW  (exl)</option>
						<option>Kozyrev      - CCY  / ?   (div)</option>
						<option>Levine       - CCY  / ?   (div)</option>
						<option>Nash         - CCY  / ALL (exl)</option>
						<option>Chu          - CBS  / ?   (div)</option>
						<option>DeLuca       - CBS  / ?   (div)</option>
						<option>Pitcher      - CBS  / ELE (exl)</option>
						<option>Yanez        - CBS  / ELE (exl)</option>
						<option>Campbell     - CBS  / ALL (exl)</option>
						<option>Lewis        - CBS  / MW  (exl)</option>
						<option>Osborne      - CBS  / ?   (div)</option>
						<option>Blackburn    - CBS  / ?   (div)</option>
						<option>Cluff        - CBS  / ELE (exl)</option>
						<option>Galen        - CBS  / ?   (div)</option>
						<option>McFadden     - CBS  / PLT (exl)</option>
						<option>Vishio       - CBS  / ?   (div)</option>
						<option>Dumont       - CBS  / ?   (div)</option>
						<option>Johns        - CBS  / PLT (exl)</option>
						<option>Keller       - CBS  / MW  (exl)</option>
						<option>Schmitt      - CBS  / MW  (exl)</option>
						<option>Winson       - CBS  / ?   (div)</option>
						<option>Boques       - CBS  / ALL (exl)</option>
						<option>Church       - CBS  / MW  (exl)</option>
						<option>Noruff       - CBS  / ?   (div)</option>
						<option>Carmichael   - CBS  / ?   (div)</option>
				</select></td>
			</tr>
			<tr>
				<td colspan='2' align='right'>
					<br>
					<img src='<?= $baseurl; ?>/img/coin_arrow_left.png' width='130px'><br>
					<br>
					<br>
				</td>
				<td colspan='2' align='left'>
					<br>
					<img src='<?= $baseurl; ?>/img/coin_arrow_right.png' width='130px'><br>
					<br>
					<br>
				</td>
			</tr>
		</table>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 2 / 8</div>
		<div class="buttons">
			<a href="" class="ritual-switch" data-step="1"><?= $_t->translate("3010") ?></a> | <span class="next-link"><a href="" id="next_Step02_Step03" class="ritual-switch not-active" data-step="3"><?= $_t->translate("3000") ?></a></span>
		</div>
	</div>

	<!--                                                                                         Step 3 -->

	<div class="ritual-step ritual-step-3">
		<h1 align='center'><?= $_t->translate("9010") ?></h1>
		
		<table width="100%" cellspacing="5">
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8050") ?>:<br><i>(<?= $_t->translate("8200") ?>)<i></td>
				<td class="spokentext"><?= $_t->translate("8210") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8220") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8230") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8050") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8240") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8220") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8230") ?></td>
			</tr>
		</table>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 3 / 8</div>
		<div class="buttons">
			<a href="" class="ritual-switch" data-step="2"><?= $_t->translate("3010") ?></a> | <span class="next-link"><a href="" id="next_Step03_Step04" class="ritual-switch not-active" data-step="4"><?= $_t->translate("3000") ?></a></span>
		</div>
	</div>

	<!--                                                                                         Step 4 -->

	<div class="ritual-step ritual-step-4">
		<h1 align='center'><?= $_t->translate("9020") ?></h1>

		<table width="100%" cellspacing="5">
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8050") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8250") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><span class="warrior1_text"></span>:</td>
				<td class="spokentext"><i><?= $_t->translate("8260") ?></i></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8050") ?>:</td>
				<td class="spokentext"><?= $_t->translate("9000") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><span class="warrior2_text"></span>:</td>
				<td class="spokentext"><i><?= $_t->translate("8260") ?></i></td>
			</tr>
		</table>

		<p><i><?= $_t->translate("8270") ?></i></p>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 4 / 8</div>
		<div class="buttons">
			<a href="" class="ritual-switch" data-step="3"><?= $_t->translate("3010") ?></a> | <span class="next-link"><a href="" id="next_Step04_Step05" class="ritual-switch not-active" data-step="5"><?= $_t->translate("3000") ?></a></span>
		</div>
	</div>


	<!--                                                                                         Step 5 -->

	<div class="ritual-step ritual-step-5">
		<h1 align='center'><?= $_t->translate("9030") ?></h1>

		<table width="100%" cellspacing="5">
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8050") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8280") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><span class="warrior1_text"></span>:</td>
				<td class="spokentext"><?= $_t->translate("8290") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><span class="warrior2_text"></span>:</td>
				<td class="spokentext"><?= $_t->translate("8290") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8050") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8300") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8220") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8230") ?></td>
			</tr>
		</table>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 5 / 8</div>
		<div class="buttons">
			<a href="" class="ritual-switch" data-step="4"><?= $_t->translate("3010") ?></a> | <span class="next-link"><a href="" id="next_Step05_Step06" class="ritual-switch not-active" data-step="6">Start Coinmachine</a></span>
		</div>
	</div>

	<!--                                                                                         Step 6 -->

	<div class="ritual-step ritual-step-6">
		<h1 align='center'><?= $_t->translate("8490") ?></h1>

		<table width="100%">
			<tr>
				<td colspan='5' align='center' class='ritual-results'>
					<div class="ritual-results">
						<img src='<?= $baseurl; ?>/img/ToB_Coin_RESULT.png' width="450px">
						<div class="hunter">
							<div class="rank"></div>
							<img class="rank-image" src="<?= $baseurl; ?>/img/rank/MW.png">
							<div class="name"></div>
							<div class="date"></div>
							<div class="bloodname"></div>
							<div class="rank-name"></div>
						</div>
						<div class="hunted">
							<div class="rank"></div>
							<img class="rank-image" src="<?= $baseurl; ?>/img/rank/MW.png">
							<div class="name"></div>
							<div class="date"></div>
							<div class="bloodname"></div>
							<div class="rank-name"></div>
						</div>
					</div>
					<br><br>
				</td>
			</tr>
			<tr class='section2'>
				<td align='right' colspan='1'><?= $_t->translate("8310") ?>:</td>
				<td align='left' colspan='4'>
					<select id='tonnage' class='select' name='tonnage' size='1' style='width:380px;' onchange='valueChanged();'>
					<option>--- <?= $_t->translate("8150") ?> ---</option>
					<option> 25-35t: MLX ACH KFX ADR JR7</option>
					<option> 30-40t: ACH KFX ADR JR7 VPR</option>
					<option> 35-45t: ADR JR7 VPR IFR SHC</option>
					<option> 40-50t: VPR IFR SHC NVA HBK HMN</option>
					<option> 45-55t: IFR SHC NVA HBK HMN SCR</option>
					<option> 50-60t: NVA HBK HMN SCR MDD</option>
					<option> 55-65t: SCR MDD EBJ HBR LBK</option>
					<option> 60-70t: MDD EBJ HBR LBK SMN</option>
					<option> 65-75t: EBJ HBR LBK SMN TBR ON1 NGT</option>
					<option> 70-80t: SMN TBR ON1 NGT GAR</option>
					<option> 75-85t: TBR ON1 NGT GAR WHK</option>
					<option> 80-90t: GAR MAD WHK HGN</option>
					<option> 85-95t: MAD WHK HGN EXE</option>
					<option>90-100t: HGN EXE DWF KDK</option>
					</select>&nbsp;&nbsp;&nbsp;(<?= $_t->translate("8350") ?>)
				</td>
			</tr>
			<tr class='section2'>
				<td align='right' colspan='1'><?= $_t->translate("8320") ?>:</td>
				<td align='left' colspan='4'>
					<select id='karte' class='select' name='karte' size='1' style='width:380px;' onchange='valueChanged();'>
					<option>--- <?= $_t->translate("8150") ?> ---</option>
					<option>Alpine Peaks</option>
					<option>Canyon Network</option>
					<option>Caustic Valley</option>
					<option>Crimson Strait</option>
					<option>Forest Colony</option>
					<option>Frozen City</option>
					<option>Grim Plexus</option>
					<option>HPG Manifold</option>
					<option>Polar Highlands</option>
					<option>River City</option>
					<option>Terra Therma</option>
					<option>The Mining Collective</option>
					<option>Tourmaline Desert</option>
					<option>Viridian Bog</option>
					</select>&nbsp;&nbsp;&nbsp;(<?= $_t->translate("8360") ?>)
				</td>
			</tr>
			<tr class='section2'>
				<td align='right' colspan='1'><?= $_t->translate("8330") ?>:</td>
				<td align='left' colspan='4'><input type='text' id='termin' name='termin' value='<?= $_t->translate("8390") ?>' maxlength='160' class='input' style='width:380px;' onchange='valueChanged();'>&nbsp;&nbsp;&nbsp;(<?= $_t->translate("8370") ?>)</td>
			</tr>
<?php if ($observer !== true): ?>
			<tr class='section2'>
				<td align='right' colspan='1'><?= $_t->translate("8340") ?> 1:</td>
				<td align='left' colspan='4'><input type='text' id='spieler1_config' name='spieler1_config' value='' maxlength='160' class='input' style='width:380px;' onchange='valueChanged();'>&nbsp;&nbsp;&nbsp;(<?= $_t->translate("8380") ?>)</td>
			</tr>
				<tr class='section2'>
				<td align='right' colspan='1'><?= $_t->translate("8340") ?> 2:</td>
				<td align='left' colspan='4'><input type='text' id='spieler2_config' name='spieler2_config' value='' maxlength='160' class='input' style='width:380px;' onchange='valueChanged();'>&nbsp;&nbsp;&nbsp;(<?= $_t->translate("8380") ?>)</td>
			</tr>
<?php endif; ?>
		</table>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 6 / 8</div>
		<div class="buttons">
			<a href="" class="ritual-switch" data-step="5"><?= $_t->translate("3010") ?></a> | <span class="next-link"><a href="" id="next_Step06_Step07" class="ritual-switch not-active" data-step="7"><?= $_t->translate("3000") ?></a></span>
		</div>

	</div>

	<!--                                                                                         Step 7 -->

	<div class="ritual-step ritual-step-7">
		<h1 align='center'><?= $_t->translate("8400") ?></h1>

		<table width="100%">
			<tr>
				<td colspan="3" style='text-align:center;'>
					<div class="ritual-results">
						<img src='<?= $baseurl; ?>/img/fight.png' width='550px'>
						<div class="hunter step-7-result">
							<div class="name"></div>
						</div>
						<div class="hunted step-7-result">
							<div class="name"></div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td width="170px">&nbsp;</td>
				<td>
					<?= $_t->translate("8410") ?>
					<br><br><br>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align='right' width="5%"><?= $_t->translate("8460") ?>:</td>
				<td align='left' width="95%">
					<select id='sieger' onchange='valueChanged();' class='select' name='sieger' size='1' style='width: 150px;'>
						<option>--- <?= $_t->translate("8150") ?> ---</option>
						<option class="warrior1_text"></option>
						<option class="warrior2_text"></option>
					</select>
				</td>
			</tr>
		</table>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 7 / 8</div>
		<div class="buttons">
			<a href="" class="ritual-switch" data-step="6"><?= $_t->translate("3010") ?></a> | <span class="next-link"><a href="" id="next_Step07_Step08" class="ritual-switch not-active" data-step="8"><?= $_t->translate("3000") ?></a></span>
		</div>

	</div>

	<!--                                                                                         Step 8 -->

	<div class="ritual-step ritual-step-8">
		<h1 align='center'><?= $_t->translate("8420") ?></h1>

		<table width="100%">
			<tr>
				<td nowrap class="speaker"><?= $_t->translate("8050") ?>:</td>
				<td class="spokentext"><?= $_t->translate("8430") ?></td>
			</tr>
			<tr>
				<td nowrap class="speaker"><span class="loser"></span>:</td>
				<td class="spokentext"><?= $_t->translate("8440") ?></td>
			</tr>
			<tr>
				<td class="speaker"><?= $_t->translate("8050") ?>:</td>
				<td class="spokentext"><span class="winner"></span>, <?= $_t->translate("8450") ?></td>
			</tr>
		</table>

		<br><br>

		<table width="100%">
			<tr>
				<td align='right' width="5%"><?= $_t->translate("8470") ?>:</td>
				<td align='left' width="95%">
					<input type='text' id='video' name='video' value='' maxlength='160' class='input' style='width:250px;' onchange='valueChanged();'>&nbsp;&nbsp;&nbsp;(<a href='http://www.youtube.com' target='_blank'>Youtube</a>-<?= $_t->translate("9040") ?>)
				</td>
			</tr>
		</table>

		<div class="stepIndicator"><?= $_t->translate("8180") ?> 8 / 8</div>
		<div class="buttons">
			<a href="" class="ritual-switch" data-step="7"><?= $_t->translate("3010") ?></a> | <span class="next-link"><a href="#" id="next_Step08_Store" class="not-active"><?= $_t->translate("8480") ?></a></span>
		</div>

	</div>
</form>
