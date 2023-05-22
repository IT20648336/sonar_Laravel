<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="css/GoogleFont.css" rel="stylesheet">		
<link rel="stylesheet" href="css/Main.css">
<link rel="stylesheet" href="css/sweetalert.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<script type="text/javascript" src="js/sweetalert.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="js/Internal.js"></script>
</head>
<body>

<div class="wrapper d-flex align-items-stretch"  style="background-color: #FFFFFF;">
<nav id="sidebar">
<div class="p-4 pt-5">
<div align="center" class="ProfileImage"> 
<img border="2" style="border: none; width:60px; height:60px;" src="/images/Logo_White.png"/>
</div>
<div class="ProfileName">
    <br>
<p>
<b>View Point</b>
</p>
</div>

<ul class="list-unstyled components mb-5"> 
<li>
<a href="/Dashboard"><img  id="Logout" src="/images/Dashboard.png"/> &nbsp;&nbsp;DASHBOARD</a>
</li>

<li>
<a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<img  id="Logout" src="/images/Create_Icon.png"/> &nbsp;&nbsp;&nbsp;NEW</a>
<ul class="collapse list-unstyled" id="pageSubmenu5">
<li>
    <a href="/CreateProject?ProjectId=0">CREATE</a> 
</li>

<li>
    <a href="/MyProject">MY PROJECT'S</a>
</li>                                          
</ul>
</li>

<li>
<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<img  id="Logout" src="/images/User.png"/> &nbsp;&nbsp;&nbsp;USER'S</a>
<ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
            <a href="/UserData">LIST</a>
        </li>
</ul>
</li>
<li>
<a href="#pageSubmenu11" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<img  id="Logout" src="/images/Inquiries.png"/> &nbsp;&nbsp;&nbsp;INQUIRIES</a>
</li>

<li>
<a href="#pageSubmenu11" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<img  id="Logout" src="/images/Contact_Us.png"/> &nbsp;&nbsp;&nbsp;CONTACT US</a>
</li>

<li>
<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img  id="Logout" src="/images/Logs.png"/> &nbsp;&nbsp;&nbsp;LOGS</a>
<ul class="collapse list-unstyled" id="pageSubmenu1">
<li>
<a href="#">ACTIVITY LOGS</a>
</li>
<li>
<a href="#">ERROR LOGS</a>
</li>
</ul>
</li>

<li>
<a href="Logout"><img  id="Logout" src="/images/Exit.png"/> &nbsp;&nbsp;&nbsp;EXIT</a>
</li>
</ul>
</div> 
</nav>
  <div id="content" class="p-4 p-md-5">