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
			<li><a href="user.php?id=<?php echo $id; ?>">Back</a></li>
	      		<li><a href="login.html">Sign out</a></li>
	    	</ul>
	  	</div>
	</div>
	<!--profile-->
	<ul class="nav nav-pills">
 		<li class="active"><a href="user.php?id=<?php echo $id; ?>">User</a></li>
 		<?php
 			$cid = $_COOKIE['id'];
 			echo "<li><a>ID: ".$cid."</a></li>";
 		?>
	</ul>
	
	<!--main-->
	<div class="col-lg-10" style="background-color:#ffffff; position:absolute; top:100px; left:200px;">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active">
  				<a href="#home" data-toggle="tab" style="padding:0px 10px;">
  					<h3><strong>Lent Books</strong></h3>
  				</a>
  			</li>
		</ul>
		
	</div>
</body>
</html>
<?php header("content-type:text/html; charset=utf-8");
	session_start();
		$servername = "localhost";
		$username = "root";
$password = "root";
$dbname = "test";
$cid=$_COOKIE['id'];;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
		
		$sql = "select bid from record where cid='$cid'";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table  style='width:45%; height:50%; position:fixed; left:15%; top:30%;'><tr><th>Book ID</th><th>Book</th><th>Author</th><th>Quantity</th></tr>";
			
         while($row = $result->fetch_assoc()) {
		 $bidnew= $row["bid"];
		 
		 $sql2= "select * from books where bid='$bidnew'";
		 $result2=$conn->query($sql2);
		 if ($result->num_rows > 0) {
			while($row = $result2->fetch_assoc()) 
			{
       
			echo "<tr><td>".$row["bid"]."</td><td>".$row["bname"]."</td><td>".$row["author"]." </td><td>".$row["number"]."</td></tr>";
			}
				
			}
		 

		 }
		 echo "</table>";
}



	
		mysql_close($conn);
	
?>