<% cached LastEdited %>
<div id="Content" class="singlecolumn typography">
$Content
<ul id="PlatformList">
<% cached 'platforms', ChildrenCacheKey %>
<% control Children %>
	<li>
	<a href="$Link" title="Download for $Title">
	$PlatformImage.SetWidth(64)
	</a>
	<a href="$Link" title="Download for $Title">
	$Title
	</a>
	</li>
<% end_control %>
<% end_cached %>
</ul>
$Form
</div>
<% end_cached %>
