<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>checkout</title>
    <script>
function orderinfo()
{
	var reviewSectionHtml = "<center><h1>PURCHASED ITEM</h1>";
	var orderTotal= 0;
	var key = sessionStorage.key(0);
    var value = sessionStorage.getItem(key);
	var columnSplit = value.split(',');
reviewSectionHtml += "<p style='text-align:center'><img width='80' height='80' src=" + columnSplit[1] + " alt=''/></p>";
reviewSectionHtml +=  "<h2>" + columnSplit[0]+ "</h2>";
reviewSectionHtml +=  "<h3>Quantity:" + columnSplit[3] +"</h3>";
reviewSectionHtml +=  "<h3>Price:" + columnSplit[2] +"</h3>";
 orderTotal = (parseFloat(orderTotal) + parseFloat(columnSplit[2] * columnSplit[3])).toFixed(2)
reviewSectionHtml +=  "<h3>Total:" + orderTotal +"</h3></center>";

 var dynamicCart = document.getElementById("orderinformation1");
    dynamicCart.innerHTML = reviewSectionHtml;

	var rhtml = "<label>Item ID:</label>";
	 rhtml += "<input type='number' maxlength='50' id='idNo' name='idNo' readonly='readonly'  value =' " + columnSplit[4] + "'/><br/> <label>Item Quantity:</label><input type='number' maxlength='50' id='itemQuantity' readonly='readonly' value =' " + columnSplit[3] +  " ' name='itemQuantity' title='itemQuantity'/><br/>"
var dynamicCart = document.getElementById("hidden");
    dynamicCart.innerHTML = rhtml;
}	
/*function insertion()
{
	var key = sessionStorage.key(0);
    var value = sessionStorage.getItem(key);
	var columnSplit = value.split(',');
	//document.getElementById("idNo").value = columnSplit[4];

 //document.getElementById("itemQuantity").value = columnSplit[3];
document.getElementById(idNo).setAttribute('value', columnSplit[4]);
document.getElementById(itemQuantity).setAttribute('value', columnSplit[3]);

		alert("2");

	
}
function ins(){
	var rhtml = "";
	var key = sessionStorage.key(0);
    var value = sessionStorage.getItem(key);
	var columnSplit = value.split(',');
 rhtml += "<label>Item ID:</label><input type="number" maxlength="50" id="idNo" name="idNo"  value = " + columnSplit[4] +  "title="idNo"/><br/> <label>Item Quantity:</label><input type="number" maxlength="50" id="itemQuantity" value =" + columnSplit[3]+ "name="itemQuantity" title="itemQuantity"/><br/>"
var dynamicCart = document.getElementById("hidden");
    dynamicCart.innerHTML = rhtml;
			 } */
    </script>


	<style type = "text/css">
     form  label {
	display: block;
	float: left;
	width:150px;
}
     input:invalid {
    border-color: orangered;
}

input:valid {
    border-color: green;
}
#hidden{
	display:block;
}
        </style>
       
</head>
<body bgcolor="white" onload='orderinfo();' >
     <h2 style="color:#4F2D7F;margin-top:-1px;" align="center"><i>Enter Customer Info</i></h2> 
    <form action="http://localhost:8090/processORDER.php?XDEBUG_SESSION_START=test" name="yourForm" id="theForm" method="POST" enctype="multipart/form-data">
            <label>First Name:</label><input type="text" maxlength="50" id="firstname" name="firstname" title="Can only contain Alphas and space"/><br/>
        	 <label>Last Name: </label><input type="text" maxlength="50" id="lastname" name="lastname" title="Can only contain Alphas, space and tickmark(')"/><br/>
             <label>E-mail:</label><input type="text" maxlength="50" id="email" name="email" title="Enter a valid email(eg:john@gmail.com)"/><br/>
             <label>Address1:</label><input type="text" maxlength="100" id="address1" name="address1"  title="Enter a valid Address"/><br/>
             <label>Address2:</label><input type="text" maxlength="100"  id="address2" name="address2" title="Optional"/><br/>
             <label>City:</label><input type="text" maxlength="50" id="city" name="city"   title="Can only contain Alphas and space" /><br/>
             <label>State:</label><input type="text" maxlength="5" id="state" name="state"  title="Enter a valid State(Eg: AR)" /><br/>
             <label>ZIP:</label><input type="number" maxlength="5" id="zip" name="zip"  title="Enter a valid ZIP code(Eg:72034)"/><br/>
             <label>Country:</label><input type="text" maxlength="20" id="country" name="country"  title="Can only contain Alphas and space"/><br/>
             <label>Phone:</label><input type="number" maxlength="20" id="phone" name="phone" title="Enter a valid number"/><br/>
             <label>Fax:</label><input type="number" maxlength="20" id="fax" name="fax"  title="Optional" /><br/> 
        <input type="checkbox" id="mailing" name="mailing" value="mailingl" />Click here to be added to the mailing list <br /><br />

        <!--<h2 style="color:#4F2D7F; margin-top:-1px;" align="center"><i>Order Information</i></h2> -->

        <div id="orderinformation1">

        </div>
		<div id ="hidden" >
            

		</div>

             <h2 style="color:#4F2D7F;margin-top:5px;" align="center" ><i>Enter Credit Card Information Below</i></h2> 
                  <input type="radio" name="creditcard" id="creditcard" value="MC" /><img src="web-content/images/checkout/mc.jpg" alt="" style="height: 12px; width: 20px" />Master Card
                  <input type="radio" name="creditcard" id="creditcard" value="Visa"  /><img src="web-content/images/checkout/visa.jpg" alt="" style="height: 12px; width: 20px" />Visa
                  <input type="radio" name="creditcard" id="creditcard" value="Discover" /><img src="web-content/images/checkout/discover.jpg" alt="" style="height: 12px; width: 20px" />Discover
                  <input type="radio" name="creditcard" id="creditcard" value="AMEX" /><img src="web-content/images/checkout/amex.jpg" alt="" style="height: 12px; width: 20px" />Amex <br />
                   <label>Credit card number:</label><input id="creditcardnumber" name="creditcardnumber"  type="text" maxlength="20" name="state"    title="Enter a valid credit card number" /><br/>
         <label>Expiration Month:</label><select id="expMonth" name="expMonth">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                       </select><br/>
         <label>Expiration Year:</label><select id="expYear" name="expYear">
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                       </select><br /><br />

    <input type="submit" value="submit" name="submit_button" />
        <input type="reset" value="Reset" name="reset_button" /><br />
                        <h2 style="color:#4F2D7F;" align="center"><B><a href="store_index.html">Return to Previous</a></B></h2>

    </form>
</body>
</html>
