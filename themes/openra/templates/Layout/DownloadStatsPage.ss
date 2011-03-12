<% cached 'downloadcount', Aggregate(DownloadPage).Sum(DownloadCount) %>
<div id="Content" class="singlecolumn">
<div style="text-align: center; padding-top: 1em;"> 
<img src="$DownloadStatsChartUrl" />
</div>
</div>
<% end_cached %>
