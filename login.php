<? php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "customers";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}


session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$my_username=mysqli_real_escape_string($conn,$_POST['username']);
	$my_password=mysqli_real_escape_string($conn,$_POST['password']);
	
	$sql="SELECT id FROM customers where username = '$my_username and passcode = '$my_password'";
	$result= mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active= $row['active'];
	
	$count = mysqli_num_rows($result);
	
	if($count==1) {
		session_register("my_username");
		$_SESSION['login_user']=$my_username;
		header("location: http://localhost:8080/sitefournos2/config.php");
		
	}
	else echo "you done fucked up";
}




?>