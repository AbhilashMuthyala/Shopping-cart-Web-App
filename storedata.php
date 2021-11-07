<?php
require 'databaseConnection.php';
include 'AES.php';
$bb = openDB();
extract($_GET);
$username=$_GET['username'];
$password=$_GET['password'];
$email=$_GET['email'];
//insertdata($bb);
//$inputText = "My text to encrypt";

	

//$stmt = $bb->prepare("INSERT INTO registration (username,password,email) VALUES (?, ?, ?)");
//$stmt->bind_param('sss',$username, $password, $email);

//$stmt->execute();
//$stmt->close();

$sql = "INSERT INTO registration (username, password, email)
VALUES ('".$username."', aes_encrypt('".$password."','key'), '".$email."')";

mysqli_query($bb, $sql);

header("Content-Type: text/plain");
header('Access-Control-Allow-Origin: *'); 
echo "passed";
	


?>
