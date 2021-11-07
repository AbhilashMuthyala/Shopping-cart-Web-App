<?php
require 'databaseConnection.php';



if(isset($_GET['id_no']))
	{
$id_no=trim($_GET['id_no']);
	}
	else
	{
$id_no='';
	}

if(isset($_GET['desc']))
	{
	$desc=trim($_GET['desc']);
	}
	else
	{
	$desc='';
	}
if(isset($_GET['image']))
	{
$image=trim($_GET['image']);
	}
	else
	{
$image='';
	}

$bb = openDB();
$sql='select * from product where item_no="'.$id_no.'"';
$fetchData=mysqli_query($bb,$sql);
$fetchedData=mysqli_fetch_row($fetchData);
$price=$fetchedData[2];
$itemname=$fetchedData[1];
$inventory=$fetchedData[3];
?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $itemname ?></title>
    
    <style type="text/css">
    .test1 { display: none;}
	    .test2 { display: none;}
		.test3{display: block;}

    </style>
</head>
<body onload="checkinventory()">
<script type="text/javascript">
	function checkinventory()
	{
     //var a = document.getElementById("quantity").innerHTML
	if('<?php echo $inventory; ?>'>0){
	       document.getElementById("option1").style.display='block'; 
      document.getElementById("option2").style.display='none'; 
	 
	       }
	else{
				document.getElementById("option3").style.display='none'; 
		document.getElementById("option1").style.display='none'; 
      document.getElementById("option2").style.display='block'; 
	}
	}
	/*function showstock()
	{
		
		
		 alert("Only  " + "<?php echo $inventory; ?> " +  " <?php echo $itemname; ?>" + " are in stock");
		
			
		
	}*/
	function checkquantity()
	{
		var ss = <?php echo $inventory; ?>;
		var tt = document.getElementById("quantity").value;

      if(tt<ss)
		{
	document.getElementById("option1").style.display='block'; 
      document.getElementById("option2").style.display='none'; 

		}
		if(tt>ss)
		{
			alert("Only  " + "<?php echo $inventory; ?> " +  " <?php echo $itemname; ?>" + " are in stock");
		   document.getElementById("option2").style.display='block'; 

		}
		if(tt==ss)
		{
			document.getElementById("option1").style.display='block'; 
      document.getElementById("option2").style.display='none'; 
		}


	}
	function buy()
	{
		          

		var p = '<?php echo $itemname; ?>';
		var q = '<?php echo $image; ?>';
		var r = '<?php echo $price; ?>';
		var s = document.getElementById("quantity").value;
		var t =  '<?php echo $id_no; ?>';
		var yy = p + ", " + q + ", " + r + ", " + s + ", " + t;
		sessionStorage.setItem(p, yy);   
		// var key = sessionStorage.key(0);
          //  var value = sessionStorage.getItem(key);
		//	alert(value);
	}
	</script>
    <center>
	
        <h1>
            <?php echo $itemname; ?>
        </h1>
        <img src="<?php echo $image; ?>" alt="" />
        <h2>
            <?php echo $desc; ?>
        </h2>
        <h1>
            Price :<?php echo $price; ?>
        </h1>

        <p id="option3" class="test3">
            <label>
                <b>Quantity</b>
            </label>
            <input type="number" maxlength="2" onchange="checkquantity();" name="quantity" id="quantity" required="required" pattern="[0-9]{1,2}" title="Enter a Quantity from 1-99"   />
            <br />
        </p>

        <p id="option1" class="test1"  >
         <!--	  <img src="web-content\images\checkout\BuyNow.png" alt="" onclick="buy()" /> -->
		 <a href="checkOUT.php" /><img src="web-content\images\checkout\BuyNow.png" onclick="buy()" ></a>
        </p>
        <p id="option2" class="test2" >Sold Out</p>

        <h2 style="color:#4F2D7F;" align="center">
            <b>
                <a href="store_index.html">Continue Shopping</a>
            </b>
        </h2>
    </center>
</body>
</html>
