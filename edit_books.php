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
 			echo "<li><a>ID: ".$aid."</a></li>";
 		?>
	</ul>
	
	<!--main-->
	<div class="col-lg-10" style="background-color:#ffffff; position:absolute; top:100px; left:200px;">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active">
  				<a href="#home" data-toggle="tab" style="padding:0px 10px;">
  					<h3><strong>Edit Books</strong></h3>
  				</a>
  			</li>
		</ul>
		
	</div>
	<div>
	<form class="form-horizontal" action="edit_books.php?id=<?php echo $id; ?>" method="POST">
  			<fieldset>
    			<legend style="text-align:center;">Enter the ID of the book that you want to delete</legend>
               	
    			
	      			<div class="col-lg-10">
	        			<input type="text" class="form-control" id="delBook" name="delB" placeholder=" book id" >
	      			</div><br/>
					<div class="form-group" style="padding:30px; text-align:Left;">
                  	<label for="select" class="control-label" style="text-align:Left;">select</label>
                  	<select class="form-control" id="select" name="type">
                    	<option>Category</option>
                     	<option>Title</option>
						<option>Author</option>
						<option>Year</option>
						<option>Quantity</option>
                  	</select>
               	</div>
				<legend style="text-align:left;">Enter the new value</legend>
               	
    			
	      			<div class="col-lg-10">
	        			<input type="text" class="form-control" id="newVal" name="newV" placeholder=" new value" >
	      			</div><br/>
					<div class="col-lg-10 col-lg-offset-2">
        				
        				<button type="submit" class="btn btn-info" style="width:35%">Update</button>
      				</div>
    			
  			</fieldset>
			</form>

	</div>
</body>
</html>
<?php
session_start();
$id= $_GET['id'];
			if(empty($id))
				header("Location:login.html");
			else{
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $type = $_POST['type'];
    $id = $_POST['delB'];
    setcookie("id", $id);
   $newValue= $_POST['newV'];
	$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
$sql1 = "select bid from books";
$result1 = $conn->query($sql1);
$count=0;
while ($row = $result1->fetch_assoc())
{
	if($row["bid"]== $id)
	{
		if($type=="Category")
{
$sql = "Update books set  btype='$newValue' where bid='$id'";
$result = $conn->query($sql);
	$count=1;
	echo "<button type='button' class='btn btn-success' style='width:45%; height:20%; position:fixed; left:15%; top:85%;'><h1><strong>Succesfully updated</strong></h1></button>";

	}
	else if($type=="Title")
{
	
$sql = "Update books set  bname='$newValue' where bid='$id'";
$result = $conn->query($sql);
	$count=1;
	echo "<button type='button' class='btn btn-success' style='width:45%; height:20%; position:fixed; left:15%; top:85%;'><h1><strong>Succesfully updated</strong></h1></button>";

	}
	else if($type=="Year")
{
$sql = "Update books set  year='$newValue' where bid='$id'";
$result = $conn->query($sql);
	$count=1;
	echo "<button type='button' class='btn btn-success' style='width:45%; height:20%; position:fixed; left:15%; top:85%;'><h1><strong>Succesfully updated</strong></h1></button>";

	}
	
	else if($type=="Author")
{
$sql = "Update books set author='$newValue' where bid='$id'";
$result = $conn->query($sql);
	$count=1;
	echo "<button type='button' class='btn btn-success' style='width:45%; height:20%; position:fixed; left:15%; top:85%;'><h1><strong>Succesfully updated</strong></h1></button>";

	}
	else if($type=="Quantity")
{
$sql = "Update books set number='$newValue' where bid='$id'";
$result = $conn->query($sql);
	$count=1;
	echo "<button type='button' class='btn btn-success' style='width:45%; height:20%; position:fixed; left:15%; top:85%;'><h1><strong>Succesfully updated</strong></h1></button>";

	}
		
}
}

if($count==0)
echo "<button type='button' class='btn btn-danger' style='width:45%; height:20%; position:fixed; left:15%; top:85%;'><h1><strong>No Book with the given ID</strong></h1></button>";

mysql_close($conn);
}
}

?>