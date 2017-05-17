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
	      		
				<li>
				<a href="user.php?id=<?php echo $id; ?>">Back</a></li>
				<li>
				<a href="login.html">Sign out</a>
				</li>
	    	</ul>
	  	</div>
	</div>
	<!--profile-->
	<ul class="nav nav-pills">
 		<li class="active"><a href="user.php?id=<?php echo $id; ?>">User</a></li>
 		<?php
 			$cid = $_COOKIE['id'];
 			echo "<li><a>User ID: ".$cid."</a></li>";
 		?>
	</ul>
	
	<div class="col-lg-10" style="background-color:#ffffff; position:absolute; top:100px; left:200px;">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active">
  				<a href="#home" data-toggle="tab" style="padding:0px 10px;">
  					<h3><strong>Borrow Books</strong></h3>
  				</a>
  			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  	<div class="tab-pane fade active in" id="home">
		  		<!--content-->
		  		<form class="form-horizontal" action="borrow.php?id=<?php echo $id; ?>" method="post">
			  		<fieldset>
    			<legend style="text-align:center;">Enter the ID of the book that you want to borrow</legend><br/>
               	
    			
	      			<div class="col-lg-10">
	        			<input type="text" class="form-control" id="borBook" name="borB" placeholder=" book id" >
	      			</div><br/>
					<div class="col-lg-10 col-lg-offset-2">
        				
        				<button type="submit" class="btn btn-info" style="width:35%">Borrow</button>
      				</div>
    			
  			</fieldset>
				</form>
				
		  	</div>
  		</div>
	</div>
</body>
</html>

<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $cid = $_COOKIE['id'];
    $bid = $_POST['borB'];
    setcookie("bid", $bid);

	$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql1="select number from books where bid='$bid'";
$result1= $conn->query($sql1);
$row = $result1->fetch_assoc();
$q=$row["number"];

if($q>0)
{
	$q=$q-1;
	$sql3="update books set number='$q' where bid='$bid'";
	$result3=$conn->query($sql3);
$sql="insert into record values ('$bid', '$cid')";
		if ($conn->query($sql) === TRUE) 
    
			echo "<button type='button' class='btn btn-success' style='width:35%; height:20%; position:fixed; left:35%; top:70%;'><h1><strong>Succesfully Added</strong></h1></button>";
		else
			echo "<button type='button' class='btn btn-danger' style='width:35%; height:20%; position:fixed; left:35%; top:70%;'><h1><strong>Failed to add </strong></h1></button>";
}
else
	echo "<button type='button' class='btn btn-danger' style='width:35%; height:20%; position:fixed; left:35%; top:70%;'><h1><strong>Books not available </strong></h1></button>";
	mysql_close($conn);




		

}

?>