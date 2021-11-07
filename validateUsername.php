<?php
require 'databaseConnection.php';
$bb = openDB();
  extract($_GET);
$username=$_GET['username'];
$sql='select * from registration where username="'.trim($username).'"';
$fetchData=mysqli_query($bb,$sql);
$fetchedData=mysqli_fetch_row($fetchData);

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


?>