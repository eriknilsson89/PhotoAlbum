<div id="myalbums">
<com:TRepeater ID="albumlistRepeater" EnableViewState="false">
 
<prop:HeaderTemplate>
<h3>My Albums</h3>
<ul>
</prop:HeaderTemplate>
 
<prop:ItemTemplate>
<li><a href='?page=album&id=<%#$this->Data['Id']%>'><%#$this->Data['Name']%></a></li>
</prop:ItemTemplate>
 
<prop:FooterTemplate>
</ul>
</prop:FooterTemplate>
 
</com:TRepeater>
</div>