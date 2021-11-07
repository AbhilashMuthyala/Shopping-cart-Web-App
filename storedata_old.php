<?php
require 'databaseConnection.php';
$bb = openDB();
  extract($_GET);
$username=$_GET['username'];
$password=$_GET['password'];
$email=$_GET['email'];
//insertdata($bb);

	
//$stmt = $bb->prepare(" INSERT INTO registration Values( :username, aes_encrypt(:password,:key), :email)");
$stmt = $bb->prepare("INSERT INTO registration (username, password, email ) VALUES (:username, :password, :email)");

$stmt->bind_param(':username',$username);
$stmt->bind_param(':password',$password);
//$stmt->bind_param(':key',"");
$stmt->bind_param(':email',$email);


$stmt->execute();
$stmt->close();
header("Content-Type: text/plain");
header('Access-Control-Allow-Origin: *'); 

echo " passed ";
	


/*
if(count($fetchedData) < 1)
{
//echo 'ERROR:'.$username. 'does not exist- Please create free account now';
header("Content-Type: text/plain");
header('Access-Control-Allow-Origin: *'); 

echo " ";
}
else
{
header("Content-Type: text/plain");
header('Access-Control-Allow-Origin: *'); 
echo "User name is registered, please choose a different User name ";

}
*/
?>
