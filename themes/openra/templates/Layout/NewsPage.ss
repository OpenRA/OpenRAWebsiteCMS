<% cached Title, LastEdited %>
<div id="Content" class="singlecolumn typography">
	<% cached 'parent', Title, $Parent.LastEdited, LastEdited %>
    <% if Level(2) %>
        <div class="breadcrumbs">
            $Breadcrumbs
        </div>
    <% end_if %>
    <% end_cached %>
             
    <h2>$Title</h2>
    <div class="newsDetails">
        Posted on $Date.Nice24 by $Author.FirstName $Author.Surname
    </div>
    $Content
<% uncached %>
    $PageComments
<% end_uncached %>
</div>
<% end_cached %>
