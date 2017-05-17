<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $type = $_POST['type'];
    $id = $_POST['account'];
	$_SESSION['username']=$id;
    setcookie("id", $id);
    $pwd = $_POST['password'];
	$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
if(empty($type) || empty($id) || empty($pwd))
{
header('Location: http://localhost:50/login.html');

}
else if(strlen($pwd)<6)
{
header('Location: http://localhost:50/login.html');

}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
if($type=="Admin")
{
$sql = "SELECT * from admin where aid='$id' and password='$pwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     $_SESSION['id']=$id;
     header('Location:http://localhost:50/admin.php?id='.urlencode($id));
		 
	 }
else
{
	header('Location:http://localhost:50/login.html');
}
}

if($type=="User")
{
$sql = "select cid from cards where cid='$id' and cpass='$pwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     $_SESSION['id']=$id;
     header('Location:http://localhost:50/user.php?id='.urlencode($id));
		 
	 }
	 else
{
	header('Location:http://localhost:50/login.html');
}
}

}

?>
