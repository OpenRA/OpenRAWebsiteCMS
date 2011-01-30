<script type="text/javascript">
	$(function() {
		/*$.get("downloads.txt", function(data) {
			$("#stats_down").html(data);
		});

		$.get("/games.txt", function(data) {
			$("#stats_games").html(data);
		});

		$.get("/master/list.php", function(data) {
			if (data.length <= 3) { $("#stats_players").html("0"); return; }
			var m, sum = 0;
			var p = /^\s*Players: (\d+)/mg;
			while ((m = p.exec(data)) != null) {
				sum += (Number)(m[1]);
			}
			$("#stats_players").html(sum);
		});
		
		$.getJSON("/releases/windows/version.json", function(data) {
		    $("#down_btn_win span.desc").html(
		        "version: " + data.version + " " +
		        "size: " + data.size);
		});
		
		$.getJSON("/releases/mac/version.json", function(data) {
		    $("#down_btn_mac span.desc").html(
		        "version: " + data.version + " " +
		        "size: " + data.size);
		});*/
	});
</script>
<div id="Sidebar">
	<!--<div style="margin: 0 auto; width: 100%">
		<span class="stats">
			<strong id="stats_games">--</strong><span class="desc">total games played</span>
		</span>
		<span class="stats">
			<strong id="stats_down">--</strong><span class="desc">downloads</span>
		</span>
	</div>-->
	<a href="releases/$Platform.Main/latest.php"><img src="$ThemeDir/images/{$Platform.Main}_download.png" /></a>
	<p class="download">
		<a href="releases/$Platform.Other1/latest.php">Download OpenRA for $Platform.Other1</a>
	</p>
	<p class="download">
		<a href="releases/$Platform.Other2/latest.php">Download OpenRA for $Platform.Other2</a>
	</p>
	<p>
		<a href="license/"><img src="$ThemeDir/images/gplv3-127x51.png" alt="GPLv3 Logo" style="border: none; margin-top: 5px;"/></a>
	</p>
	<div style="text-align: center; font-weight: bold">Supported graphics cards:</div>
	<div style="text-align: left; width: 300px; margin: auto;">
		<p>
			Radeon 9500 or later
			<br />
			Nvidia FX (5) series or later
			<br />
			Intel GMA X3000-X4500, GMA 500 or later
			<br />
			<span style="font-size:0.8em">(The GMA 900-950 are not supported)</span>
		</p>
	</div>
</div>
