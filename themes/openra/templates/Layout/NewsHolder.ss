<div id="Content" class="singlecolumn typography">
	<h2>$Title</h2>
	$Content
	<ul id="NewsList" class="rounded">
		<% control SortedChildren %>
			<li class="newsDateTitle"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></li>
            <li class="newsDateTitle">$Date.Nice24</li>
            <li class="newsSummary">$Content.FirstParagraph</li>
            <li class="newsCommentCount"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Comments.Count Comments</a></li>
		<% end_control %>
	</ul>
</div>
