<style>
<?php if ($observer === true): ?>
	.buttons {
		display: none;
	}
<?php endif; ?>

	.warrior1_text {
		color: #4fe228;	
	}
	.warrior2_text {
		color: #4fe228;
	}
	.winner {
		color: #4fe228;
	}
	.loser {
		color: #4fe228;
	}

	.container {
		height: 95%;
	}
	.next-link {
		display: inline-block;
		width: 130px;
		text-align: left;
	}
	.not-active {
		pointer-events: none;
		cursor: default;
		text-decoration: line-through;
		color: #ff0000;
		font-style: italic;
	}

	.ritual-results {
		position: relative;
	}

	.hunter .rank {
		display: none;
	}

	.hunter .rank-image {
		width: 29px;
		position: absolute;
		top: 120px;
/* 		left: 360px; */
		left: 365px;
	}

	.hunter .name {
		position: absolute;
		top: 140px;
/* 		left: 392px; */
		left: 412px;
	}

	.hunter .bloodname {
		position: absolute;
		top: 160px;
		left: 206px;
		color: #886f36;
		text-transform: uppercase;
		font-weight: bold;
		width: 73px;
		font-size: 13px;
	}

	.hunter .date {
		position: absolute;
		left: 207px;
		top: 179px;
		color: #886f36;
		font-weight: bold;
		font-size: 11px;
		width: 72px;
	}

	.hunter .rank-name {
		display: none;
	}

	.hunted .rank {
		display: none;
	}

	.hunted .rank-image {
		width: 29px;
		position: absolute;
		top: 28px;
/* 		left: 314px; */
		left: 319px; */
	}

	.hunted .name {
		position: absolute;
		top: 48px;
/* 		left: 346px; */
		left: 366px;
	}

	.hunted .bloodname {
		display: none;
	}

	.hunted .date {
		display: none;
	}

	.hunted .rank-name {
		display: none;
	}

	.step-7-result {
		color: black;
		font-size: 25px;
		font-weight: bold;
	}

	.hunter.step-7-result .name {
		left: 90px;
		width: 210px;
		top: 44px;
	}

	.hunted.step-7-result .name {
		width: 210px;
		top: 44px;
		left: 388px;
	}
</style>
