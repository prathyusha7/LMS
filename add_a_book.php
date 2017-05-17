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
		<?php
 			$aid = $_COOKIE['id'];
			$id= $_GET['id'];
			if(empty($id))
				header("Location:login.html");
			else
 			echo "<li><a>ID: ".$aid."</a></li>";
 		?>
	    	<ul class="nav navbar-nav navbar-right">
			<li><a href="admin.php?id=<?php echo $id; ?>">Back</a></li>
	      		<li><a href="login.html">Sign out</a></li>
	    	</ul>
	  	</div>
	</div>
	<!--profile-->
	<ul class="nav nav-pills">
 		<li class="active"><a href="admin.php?id=<?php echo $id; ?>">Admin</a></li>
 		<?php
 			$aid = $_COOKIE['id'];
			$id= $_GET['id'];
			if(empty($id))
				header("Location:login.html");
			else
 			echo "<li><a>ID: ".$aid."</a></li>";
 		?>
	</ul>
	
	<!--main-->
	<div class="col-lg-10" style="background-color:#ffffff; position:absolute; top:100px; left:200px;">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active">
  				<a href="#home" data-toggle="tab" style="padding:0px 10px;">
  					<h3><strong>Add a Book</strong></h3>
  				</a>
  			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  	<div class="tab-pane fade active in" id="home">
		  		<!--content-->
		  		<form class="form-horizontal" action="add_a_book.php?id=<?php echo $id; ?>" method="POST">
			  		<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">Book ID</label>
	  					<input class="form-control" id="focusedInput" name="bid" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">Category</label>
	  					<input class="form-control" id="focusedInput" name="btype" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">Title</label>
	  					<input class="form-control" id="focusedInput" name="bname" type="text">
					</div>
					
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">Year</label>
	  					<input class="form-control" id="focusedInput" name="year" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">Author</label>
	  					<input class="form-control" id="focusedInput" name="author" type="text">
					</div>
					<div class="form-group" style="width:40%">
	  					<label class="control-label" for="focusedInput">Quantity</label>
	  					<input class="form-control" id="focusedInput" name="number" type="text">
					</div>
					
					<button type="submit" class="btn btn-info" style="width:15%; height:20%; position:fixed; left:65%; top:45%;"><h1><strong>Add</strong></h1></button>
				</form>
		  	</div>
  		</div>
	</div>
</body>
</html>
<?php header("content-type:text/html; charset=utf-8");
session_start();
$id= $_GET['id'];
			$_SESSION['id']=$id;
	$bid = $_POST['bid'];
	$btype = $_POST['btype'];
	$bname = $_POST['bname'];
	$year = $_POST['year'];
	$author = $_POST['author'];
	$number = $_POST['number'];
	$flag = $bid==NULL || $btype==NULL || $bname==NULL ||  $year==NULL || $author==NULL ||  $number==NULL;
	if (!$flag){
		$servername = "localhost";
		$username = "root";
$password = "root";
$dbname = "test";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
		
		$sql = "insert into books values('$bid', '$btype', '$bname', '$year', '$author',  '$number')";
		

		if ($conn->query($sql) === TRUE) 
    
			echo "<button type='button' class='btn btn-success' style='width:35%; height:20%; position:fixed; left:65%; top:70%;'><h1><strong>Succesfully Added</strong></h1></button>";
		else
			echo "<button type='button' class='btn btn-danger' style='width:15%; height:20%; position:fixed; left:65%; top:70%;'><h1><strong>Failed to add </strong></h1></button>";
		mysql_close($conn);
			}
?>