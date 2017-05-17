<!DOCTYPE HTML>
<html>
<head>
  <meta charset="uft-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<title>Library Management System</title>
</head>
<body background="back.jpg">
<h1 style="text-align:center; color:white;">Eugene McDermott Library</h1>
	<div class="col-lg-6" style="position:fixed; top:25%; left:30%; width:35%;">
		<div class="well bs-component">
			<form class="form-horizontal" action="register.php" method="POST">
  			<fieldset>
    			<legend style="text-align:center;">Please Register</legend>
               
    			<div class="form-group">
	      			<label for="inputEmail" class="col-lg-2 control-label">ID</label>
	      			<div class="col-lg-10">
	        			<input type="text" class="form-control" id="inputEmail" name="account" placeholder=" user id">
	      			</div>
    			</div>
				<div class="form-group">
      				<label for="inputPassword" class="col-lg-2 control-label">Name</label>
      				<div class="col-lg-10">
        				<input type="text" class="form-control" id="inputName" name="name" placeholder="name">
      				</div>
    			</div>
    			<div class="form-group">
      				<label for="inputPassword" class="col-lg-2 control-label">Password</label>
      				<div class="col-lg-10">
        				<input type="password" class="form-control" id="inputPassword" name="password" placeholder="password">
      				</div>
    			</div>
    			<div class="form-group">
      				<div class="col-lg-10 col-lg-offset-2">
        				
        				<button type="submit" class="btn btn-info" style="width:75%">Register</button>
      				</div>
    			</div>
  			</fieldset>
			</form>
		</div>
	</div>
</body>
</html>

<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    $id = $_POST['account'];
    setcookie("id", $id);
    $pwd = $_POST['password'];
	 $name = $_POST['name'];
	$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
if(empty($name) || empty($id) || empty($pwd))
{
header('Location: http://localhost:50/register.php');
}

else if(!ctype_alpha($name))
{
header('Location: http://localhost:50/register.php');
}

else if(strlen($pwd)<6)
{
header('Location: http://localhost:50/register.php');
}



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "insert into cards values('$id','$name','$pwd')";
//$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) 
{
			echo "<button type='button' class='btn btn-success' style='width:35%; height:20%; position:fixed; left:65%; top:70%;'><h1><strong>Succesfully Registered</strong></h1></button>";
		echo '<div style="padding-top:33%;padding-left:37%;"><a href="login.html" style="color:white;text-decoration:underline;font-size:40px;"> Click here to login</a></div>';
		
}
else
			echo "<button type='button' class='btn btn-success' style='width:35%; height:20%; position:fixed; left:65%; top:70%;'><h1><strong>Id already exists </strong></h1></button>";
		mysql_close($conn);

}


?>