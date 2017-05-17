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
  					<h3><strong>Delete Books</strong></h3>
  				</a>
  			</li>
		</ul>
		
	</div>
	<div>
	<form class="form-horizontal" action="delete_books.php?id=<?php echo $id; ?>" method="POST">
  			<fieldset>
    			<legend style="text-align:center;">Enter the ID of the book that you want to delete</legend>
               	
    			
	      			<div class="col-lg-10">
	        			<input type="text" class="form-control" id="delBook" name="delB" placeholder=" book id" >
	      			</div>
					<div class="col-lg-10 col-lg-offset-2">
        				
        				<button type="submit" class="btn btn-info" style="width:35%">Delete</button>
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
   
    $bid = $_POST['delB'];
    setcookie("bid", $bid);
    
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
	if($row["bid"]== $bid)
	{
		$sql = "delete from books where bid='$bid'";
		$result = $conn->query($sql);
		echo "<button type='button' class='btn btn-success' style='width:45%; height:20%; position:fixed; left:15%; top:70%;'><h1><strong>Succesfully Deleted</strong></h1></button>";
	$count=1 ;
	
	}
		
}
if($count==0)
	echo "<button type='button' class='btn btn-danger' style='width:45%; height:20%; position:fixed; left:15%; top:70%;'><h1><strong>No Book with the given ID</strong></h1></button>";





    	
					mysql_close($conn);


			}}

?>