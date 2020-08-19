<?php

session_start();

$username1 = filter_input(INPUT_POST, 'username');
$password1 = filter_input(INPUT_POST, 'password');
$confirmpassword1 = filter_input(INPUT_POST, 'confirmpassword');
$name1=filter_input(INPUT_POST,'name');
$surname1=filter_input(INPUT_POST,'surname');
$address1=filter_input(INPUT_POST,'address');
$email1=filter_input(INPUT_POST,'email');



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

if ( !isset($username1,$password1) ) {

	echo('Please fill both the username and password fields!');

}

if ($stmt = $conn->prepare('SELECT  name,password,email FROM customers_info WHERE username = ?')) {
	
	$stmt->bind_param('s', $username1);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($name, $password,$email);
	$stmt->fetch();
	
	if ($password1 === $password) {
		
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $username1;
		$_SESSION['email']=$email;
		
header('Location: http://localhost:8080/sitefournos2/connected.php');
	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect username!';
}


	$stmt->close();
}
?>
<html>
<style>
.button2 {background-color: #008CBA;} /* Blue */
</style>

<body>

<a href="http://localhost:8080/sitefournos2/mainmenu.html"><button class="button button2">Κεντρική Σελίδα</button></a>


</body>
</html>
