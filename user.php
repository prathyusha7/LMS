<!DOCTYPE HTML>
<html>
<head>
	<meta charset="uft-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>Library Management System</title>
</head>
<body style="overflow:scroll;">
	<!--topbar-->
	<div class="navbar navbar-inverse">
  		<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
				<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
				<span class="icon-ba%6r"></span>
    		</button>
    	<a class="navbar-brand" href="#">Library Management System</a>
	  	</div>
  		<div class="navbar-collapse collapse navbar-inverse-collapse">
	    	<ul class="nav navbar-nav navbar-right">
	      		<li>
				
				<a href="login.html">Sign out</a></li>
	    	</ul>
	  	</div>
	</div>
	<!--profile-->
	<ul class="nav nav-pills">
 		<li class="active"><a href="user.php?id=<?php echo $id; ?>">User</a></li>
 		<?php
		session_start();
 			$cid = $_COOKIE['id'];
			$id= $_GET['id'];
			if(empty($id))
				header("Location:login.html");
			else
 			echo "<li><a>User Id: ".$cid."</a></li>";
 		?>
	</ul>
	<!--operations-->
	<div class="alert alert-dismissable alert-warning" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="lent.php?id=<?php echo $id; ?>" style="text-decoration: none;"><strong><h1>Books lent</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-info" style="width:45%; text-align:center; margin:30px; float:right;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="borrow.php?id=<?php echo $id; ?>" style="text-decoration:none;"><strong><h1>Borrow Books</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-info" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="return.php?id=<?php echo $id; ?>" style="text-decoration: none;"><strong><h1>Return Books</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-warning" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="search.php?id=<?php echo $id; ?>" style="text-decoration: none;"><strong><h1>Search</h1></strong></a>
	</div>
</body>
</html>