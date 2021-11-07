<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>order</title>
   
</head>
<body>
<script>

</script>
<?php 
require 'databaseConnection.php';
$bb=openDB();
insertCustomerData($bb);
insertOrderData($bb);
function insertCustomerData(&$bb)
{
$ccno=$_POST['creditcardnumber'];
$expmo=$_POST['expMonth'];
$expyr=$_POST['expYear'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
if(isset($_POST['mailing']))	
{
$mail_list=$_POST['mailing'];
}
else {
$mail_list=0;
}
$stmt = $bb->prepare("INSERT INTO customer (cc_no, exp_mo, exp_yr,name_first,name_last,email,address1,address2,city,state,zip,country,phone,fax,mail_list) VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssssssssss',$ccno, $expmo, $expyr, $firstname,$lastname,$email,$address1,$address2,$city,$state,$zip,$country,$phone,$fax,$mail_list);

$stmt->execute();
$stmt->close();



}

function insertOrderData(&$bb)
{
$itemno=$_POST['idNo'];
$ccno=$_POST['creditcardnumber'];
$itemQuantity=$_POST['itemQuantity'];
$stmt = $bb->prepare("INSERT INTO orders (item_no,cc_no,quantity,date_sold ) VALUES (?, ?, ?,?)");
$stmt->bind_param('ssss',$itemno,$ccno, $itemQuantity,date('Y-m-d'));

$stmt->execute();
$stmt->close();


$sql='select * from product where item_no="'.trim($itemno).'"';

$fetchData=mysqli_query($bb,$sql);

$fetchedData=mysqli_fetch_row($fetchData);

$itemquantity=$fetchedData[3];
$remainingquantity=$itemquantity-$itemQuantity;
$updatesql='update product set inventory="'.$remainingquantity.'" where item_no="'.trim($itemno).'"';
mysqli_query($bb, $updatesql);

}
header( 'Location: success.html' ) ;
?>


</body>
</html>