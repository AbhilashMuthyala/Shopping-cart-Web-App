<?php
require 'databaseConnection.php';
$bb = openDB();
  extract($_GET);
$username=$_GET['username'];
$password=$_GET['password'];


$sql='select * from registration where username="'.trim($username).'" and password=aes_encrypt("'.trim($password).'","key")';
$fetchData=mysqli_query($bb,$sql);
$fetchedData=mysqli_fetch_row($fetchData);
 // ensures anything dumped out will be caught

if(count($fetchedData) < 1)
{
//echo 'ERROR:'.$username. 'does not exist- Please create free account now';
header("Content-Type: text/plain");
header('Access-Control-Allow-Origin: *'); 

echo "Please enter a valid password ";
}
else
{
header("Content-Type: text/plain");
header('Access-Control-Allow-Origin: *'); 

// do stuff here
echo "1";
}


?>