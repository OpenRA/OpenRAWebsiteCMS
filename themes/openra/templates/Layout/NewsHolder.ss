<% cached Title, LastEdited %>
<div id="Content" class="singlecolumn typography">
	<h2>$Title</h2>
	$Content
	<ul id="NewsList" class="rounded">
		<% cached 'newsposts', Aggregate(NewsPage).Max(LastEdited), CommentsTimeout %>
			<% control SortedChildren %>
				<li class="newsDateTitle"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></li>
		        <li class="newsDateTitle">$Date.Nice24</li>
		        <li class="newsSummary">$Content.FirstParagraph</li>
			<li class="newsSummary"><a href="$Link" title="Read more on &quot;{$Title}&quot;">Read More ($Comments.Count Comments)</a></li>
			<% end_control %>
		<% end_cached %>
	</ul>
</div>
<% end_cached %>
