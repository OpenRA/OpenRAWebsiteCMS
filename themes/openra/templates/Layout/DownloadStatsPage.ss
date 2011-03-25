<% cached 'downloadcount', Aggregate(DownloadCount).Sum(Count) %>
<div id="Content" class="singlecolumn">
<div style="text-align: center; padding-top: 1em;"> 
<img src="$DownloadStatsChartUrl" />
</div>
</div>
<% end_cached %>
