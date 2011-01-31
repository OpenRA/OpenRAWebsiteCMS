<% include Sidebar %>
<div id="Content" class="twocolumn typography">
	<h2>Welcome Back Commander</h2>
	$Content
	$Form
	<h2>News</h2>
	<ul id="NewsList" class="rounded">
    <% control LatestNews(2) %>
    	<% if First %>
    	<li class="newsDateTitle"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></li>
        <li class="newsDateTitle">$Date.Nice</li>
        <li class="newsSummary">$Content</li>
        <li class="newsCommentCount"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Comments.Count Comments</a></li>
    	<% else %>
        <li class="newsDateTitle"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Title</a></li>
        <li class="newsDateTitle">$Date.Nice</li>
        <li class="newsCommentCount"><a href="$Link" title="Read more on &quot;{$Title}&quot;">$Comments.Count Comments</a></li>
        <% end_if %>
    <% end_control %>
	</ul>
</div>
