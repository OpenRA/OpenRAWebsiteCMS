<% cached LastEdited %>
<div id="Content" class="singlecolumn typography">
<% cached 'folder', FolderModCacheKey %>
<div id="DownloadLatest">
	<a href="{$Link}release/latest">$PlatformImage.SetWidth(64)</a>
	<div style="padding-top: 15px;">
		<a href="{$Link}release/latest" title="Download Latest Version">Download Latest Version</a><br />
		($LatestDownload.version, $LatestDownload.file.getSize)
	</div>
</div>
<% end_cached %>
$Content
$Form
<h3>Older Versions</h3>
<ul style="list-style-type: none;">
<% cached 'folder', FolderModCacheKey %>
<% control AllDownloads(release, true) %>
	<li><a href="{$Top.Link}release/$version">$version</a> ($file.getSize)</li>
<% end_control %>
<% end_cached %>
</ul>
</div>
<% end_cached %>
