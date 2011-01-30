<div id="Content" class="singlecolumn typography">
    <% if Level(2) %>
        <div class="breadcrumbs">
            $Breadcrumbs
        </div>
    <% end_if %>
             
    <h2>$Title</h2>
    <div class="newsDetails">
        Posted on $Date.Nice24 by $Author.FirstName $Author.Surname
    </div>
    $Content
    $PageComments
</div>
