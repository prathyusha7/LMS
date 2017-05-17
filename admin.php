<!DOCTYPE HTML>
<html>
<head>
	<meta charset="uft-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<title>Library Management System</title>
</head>
<body>
	<!--topbar-->
	<div class="navbar navbar-inverse">
  		<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
				<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
				<span class="icon-bar"></span>
    		</button>
    	<a class="navbar-brand" href="#">Library Management System</a>
	  	</div>
  		<div class="navbar-collapse collapse navbar-inverse-collapse">
	    	<ul class="nav navbar-nav navbar-right">
	      		<li><a href="login.html">Sign Out</a></li>
	    	</ul>
	  	</div>
	</div>
	<!--profile-->
	<ul class="nav nav-pills">
 		<li class="active"><a href="admin.php">Admin</a></li>
 		<?php
		session_start();
		
 			$aid = $_COOKIE['id'];
			$id= $_GET['id'];
			if(empty($id))
				header("Location:login.html");
			else
 			echo "<li><a>ID: ".$aid."</a></li>";
 		?>
	</ul>
	<!--operations-->
	<div class="alert alert-dismissable alert-warning" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="add_a_book.php?id=<?php echo $id; ?>" style="text-decoration: none;"><strong><h1>Add Books</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-success" style="width:45%; text-align:center; margin:30px; float:right;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="delete_books.php?id=<?php echo $id; ?>" style="text-decoration: none;"><strong><h1>Delete Books</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-info" style="width:45%; text-align:center; margin:30px; float:left;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="edit_books.php?id=<?php echo $id; ?>" style="text-decoration: none;"><strong><h1>Edit Books</h1></strong></a>
	</div>
	<div class="alert alert-dismissable alert-info" style="width:45%; text-align:center; margin:30px; float:right;">
  		<button type="button" class="close" data-dismiss="alert"></button>
  		<a href="view_books.php?id=<?php echo $id; ?>" style="text-decoration: none;"><strong><h1>View Books</h1></strong></a>
	</div>
	
</body>
</html>