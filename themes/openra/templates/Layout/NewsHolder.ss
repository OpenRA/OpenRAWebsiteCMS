<div id="Content" class="singlecolumn typography">
	$Content
	<ul id="NewsList">
		<% control Children %>
			<li class="newsDateTitle"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></li>
            <li class="newsDateTitle">$Date.Nice24</li>
            <li class="newsSummary">$Content.FirstParagraph <a href="$Link" title="Read more on &quot;{$Title}&quot;">Read more &gt;&gt;</a></li>
		<% end_control %>
	</ul>
</div>
