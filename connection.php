<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$confirmpassword = filter_input(INPUT_POST, 'confirmpassword');
$name=filter_input(INPUT_POST,'name');
$surname=filter_input(INPUT_POST,'surname');
$address=filter_input(INPUT_POST,'address');
$email=filter_input(INPUT_POST,'email');


$nameErr = $passErr = "";





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


if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 $nameErr = "Only letters and white space allowed ";
 echo "$nameErr";
 die();

    }
 if(strlen($password)<6)
 {
	 $passErr="Password must be consisted of at least 6 characters";
	 echo $passErr;
 }
	
if ($password != $confirmpassword)
{
	$passErr="Passwords dont match";
	echo $passErr;
}


if (empty($passErr)){
$sql = "INSERT INTO customers_info(username,password,name,surname,address,email)
values ('$username','$password', '$name', '$surname', '$address', '$email')";


if ($conn->query($sql)){
echo "New record is inserted sucessfully";


}

else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}


?>

<!DOCTYPE html>
<html>
<head>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


.button2 {background-color: #008CBA;} /* Blue */
</style>
</head>
<body>



<a href="http://localhost:8080/sitefournos2/xasimoxronou.html"><button class="button button2">Κεντρική Σελίδα</button></a>

</body>
</html>
