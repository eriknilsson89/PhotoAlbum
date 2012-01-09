<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >

<com:THead Title=<%$ SiteTitle %> >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="Stylesheet" type="text/css" href="assets/basic.css" />
</com:THead>

<body>
<div id="page">
<com:TForm>

<div id="header">
<h1 id="header-title"><a href="<%=$this->Request->ApplicationUrl %>">Titel</a></h1>
</div><!-- end of header -->
<div id="container">
<div id="main">
<com:TContentPlaceHolder ID="Main" />
</div><!-- end of main -->

<div id="sidebar">
<com:TContentPlaceHolder ID="Sidebar" />
</div>
</div>
<div id="footer">
</div><!-- end of footer -->

</com:TForm>
</div><!-- end of page -->
</body>
</html>
