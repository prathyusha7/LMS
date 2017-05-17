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
 			$uid = $_COOKIE['id'];
 			echo "<li><a>ID: ".$uid."</a></li>";
 		?>
	</ul>
	
	<!--main-->
	<div class="col-lg-10" style="background-color:#ffffff; position:absolute; top:100px; left:200px;">
		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
  			<li class="active">
  				<a href="#home" data-toggle="tab" style="padding:0px 10px;">
  					<h3><strong>Search</strong></h3>
  				</a>
  			</li>
		</ul>
		
	</div>
	<div>
	<form class="form-horizontal" action="search.php?id=<?php echo $id; ?>" method="POST">
	
  			<fieldset>
				<div class="form-group" style="padding:30px; text-align:Left;">
                  	<label for="select" class="control-label" style="text-align:Left;">select a criteria for search</label>
                  	<select class="form-control" id="select" name="type">
                    	<option>Category</option>
                     	<option>Title</option>
						<option>Author</option>
						<option>Year</option>
						                  	</select>
               	</div>
				
				
				
				
               	
    			
	      			<div class="col-lg-10">
					<label for="select" class="control-label" style="text-align:Left;">Enter the Value</label>
	        			<input type="text" class="form-control" id="newVal" name="newV" placeholder=" new value" >
	      			</div><br/>
					<div class="col-lg-10 col-lg-offset-2">
        				
        				<button type="submit" class="btn btn-info" style="width:35%">Search</button>
      				</div>
    			
  			</fieldset>
			
			</form>

	</div>
</body>
</html>
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $type = $_POST['type'];
     
   $newValue= $_POST['newV'];
	$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

if($type=="Category")
{
$sql = "select * from books where btype='$newValue'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table  style='width:45%; height:25%; position:fixed; left:15%; top:72%'><tr><th>Book ID</th><th>Book</th><th>Author</th><th>Quantity</th></tr>";
     while($row = $result->fetch_assoc()) {
       
echo "<tr><td>".$row["bid"]."</td><td>".$row["bname"]."</td><td>".$row["author"]." </td><td>".$row["number"]."</td></tr>";
	 }
echo "</table>";
}	
	
	}
	else if($type=="Title")
{
	$sql = "select * from books where bname='$newValue'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table  style='width:45%; height:25%; position:fixed; left:15%; top:72%;'><tr><th>Book ID</th><th>Book</th><th>Author</th><th>Quantity</th></tr>";
     while($row = $result->fetch_assoc()) {
       
echo "<tr><td>".$row["bid"]."</td><td>".$row["bname"]."</td><td>".$row["author"]." </td><td>".$row["number"]."</td></tr>";
	 }
echo "</table>";
}	
	}
	else if($type=="Year")
{
$sql = "select * from books where year='$newValue'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table  style='width:45%; height:25%; position:fixed; left:15%; top:72%;'><tr><th>Book ID</th><th>Book</th><th>Author</th><th>Quantity</th></tr>";
     while($row = $result->fetch_assoc()) {
       
echo "<tr><td>".$row["bid"]."</td><td>".$row["bname"]."</td><td>".$row["author"]." </td><td>".$row["number"]."</td></tr>";
	 }
echo "</table>";
}	
	}
	
	else if($type=="Author")
{
$sql = "select * from books where author='$newValue'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table  style='width:45%; height:25%; position:fixed; left:15%; top:72%;'><tr><th>Book ID</th><th>Book</th><th>Author</th><th>Quantity</th></tr>";
     while($row = $result->fetch_assoc()) {
       
echo "<tr><td>".$row["bid"]."</td><td>".$row["bname"]."</td><td>".$row["author"]." </td><td>".$row["number"]."</td></tr>";
	 }
echo "</table>";
}	
	}

}
?>