<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<% base_tag %>
		<title>$SiteConfig.Title - $Title</title>
		<% require themedCSS(layout) %> 
		<% require themedCSS(typography) %>
		<% require themedCSS(form) %>
	</head>
	<body>
	<div id="Wrap">
		<div style="padding-top: 30px;">
		<div id="Header" class="bar typography">
			<h1><img src="$ThemeDir/images/soviet-logo.png" />$SiteConfig.Title</h1>
		</div>
		<div id="Container">
			<div id="Navigation" class="typography">
				<% cached 'navigation', Aggregate(Page).Max(LastEdited) %>
					<% control Menu(1) %>
					<span class="links"><a href="$Link">$MenuTitle</a></span>
					<% end_control %>
				<% end_cached %>
			</div>
			<div id="Layout">
				$Layout
			</div>
		</div>
		</div>
	</div>
	<div id="Footer" class="bar typography">
		<p id="trademarks">
			Copyright &copy; 2007-2011 The OpenRA Developers<br />
			Platform icons by Tatice (<a href="http://tatice.deviantart.com/">http://tatice.deviantart.com/</a>)
		</p>
	</div>
	</body>
</html>
