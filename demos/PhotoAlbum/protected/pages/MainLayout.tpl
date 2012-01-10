<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >

<com:THead Title=<%$ SiteTitle %> >
<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="en"/>
<link rel="Stylesheet" type="text/css" href="assets/basic.css" />
</com:THead>

<body>
<div id="page">
<com:TForm>

<div id="header">
<h1 id="header-title"><a href="<%=$this->Request->ApplicationUrl %>">Photo Album</a></h1>
<h2 id="header-subtitle">- Keep your memories</h2>
</div><!-- end of header -->

<div id="nav">
	<ul>
<com:TConditional Condition="$this->User->IsGuest">
	<prop:TrueTemplate>
		<li><a href="index.php">Home</a></li>
	</prop:TrueTemplate>
	<prop:FalseTemplate>
		<li><a href="index.php">Home</a></li>
		<li><a href="?page=createAlbum">Create Album</a></li>
	</prop:FalseTemplate>
</com:TConditional>
	</ul>
</div>
<div id="container">
<div id="main">
<com:TContentPlaceHolder ID="Main" />
</div><!-- end of main -->

<div id="sidebar">
<com:TContentPlaceHolder ID="Sidebar" />
</div>
</div>
<div id="footer">
<com:LoginPortlet
    Visible="<%= $this->User->IsGuest %>" />
 
<com:TLinkButton Text="Logout"
    OnClick="logoutButtonClicked"
    Visible="<%= !$this->User->IsGuest %>"
    CausesValidation="false" />


</div><!-- end of footer -->

</com:TForm>
</div><!-- end of page -->
</body>
</html>