<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<% base_tag %>
		<title>$SiteConfig.Title - $Title</title>
		<% require themedCSS(layout) %> 
		<% require themedCSS(typography) %>
	</head>
	<body>
		<div id="Header" class="bar typography">
			<h1><img src="themes/openra/images/soviet-logo.png" />$SiteConfig.Title</h1>
		</div>
		<div id="Container">
			<div id="Navigation" class="typography">
				<% control Menu(1) %>
				<span class="links"><a href="$Link">$MenuTitle</a></span>
				<% end_control %>
			</div>
			<div id="Layout">
				$Layout
			</div>
		</div>
		<div id="Footer" class="bar typography">
			<p id="trademarks">
				Copyright &copy; 2007-2011 The OpenRA Developers<br />
				Command &amp; Conquer and Command &amp; Conquer Red Alert are trademarks or registered
				trademarks of Electronic Arts Inc.in the U.S. and/or other countries.<br />
			</p>
		</div>
		$SilverStripeNavigator
	</body>
</html>
