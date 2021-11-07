function checkinventory(){
	//var a = document.getElementById("quantity").innerHTML
	if(100>0){
		document.getElementById("option1").style.display='block'; 
            document.getElementById("option2").style.display='none'; 
	}
	else{
	document.getElementById("option1").style.display='none'; 
            document.getElementById("option2").style.display='block'; 
	}
	
}
function reviewcart() {
    var sessionStorageLength = sessionStorage.length;
    if (sessionStorageLength == '0') {
        alert("Empty Cart-Please Buy Something First")
    }
    else {
        window.location.href = "reviewcart.html";
            }
}
function homepage() {
    window.location.href = "index.html";
}
function atc() {
   
    var a = document.getElementById("catalog").innerHTML;
    var b = document.getElementById("ItemName").innerHTML;
    var c = document.getElementById("imagelink").innerHTML;
    var d = document.getElementById("price").innerHTML;
    var e = document.getElementById("quantity").value;
    var quantitycheck = new RegExp("[1-9]{1,2}");
    var result = quantitycheck.test(e);
    if (result == false) {
        alert("Quantity should be in digits only and should be greater than zero");
    }
    else 
        {
        var flag = confirm("Add Item To Cart");
        if (flag == true)
        {
            var y = a + ", " + b + ", " + c + ", " + d + ", " + e;
            sessionStorage.setItem(b, y);
            
            window.location.href = "store_index.html";
        }
        else {
            window.location.href = "#";
        }
    }
   
}
function loadCart()
{
    var dynamicCart = document.getElementById("reviewcartsection");
    var reviewSectionHtml = '';
    var orderTotal = 0;
    if (sessionStorage.length > 0)
    {
        reviewSectionHtml = "<center><table border='1'><thead><th>Catalog#</th><th>Item</th><th>Price</th><th>Quantity</th><th>Total</th></thead>";
        for (var i = 0; i < sessionStorage.length; i++)
        {
            var key = sessionStorage.key(i);
            var value = sessionStorage.getItem(key);
            var columnSplit = value.split(',');
            reviewSectionHtml += '<tr><td>' + columnSplit[0] + '</td><td>' + columnSplit[1] + "<p style='text-align:center'><img width='80' height='80' src=" + columnSplit[2] + " alt=''/></p><p><input type='button' value='Remove' onclick='removeItem(\"" + sessionStorage.key(i) + "\")';/></p></td><td>$" + columnSplit[3] + "</td><td>" + columnSplit[4] + "</td><td>$" + (columnSplit[3] * columnSplit[4]).toFixed(2) + "</td></tr>";
            orderTotal = (parseFloat(orderTotal) + parseFloat(columnSplit[3] * columnSplit[4])).toFixed(2)
        }
        reviewSectionHtml += "<tr><td colspan=4 id=totalrow> Total: </td><td>$" + orderTotal + "</td></tr> </table></center>";
        dynamicCart.innerHTML = reviewSectionHtml;
    }
    else {
        alert("Empty Cart-Please Buy Something First");
        dynamicCart.innerHTML = reviewSectionHtml;
    }
}
function removeItem(name)
{
    var flag = confirm("Remove" + name + " from Cart?");
    if (flag == true)
    {
            sessionStorage.removeItem(name);
            loadCart();
        window.location.href = "reviewcart.html";

    }
    else {
        window.location.href = "#";
    }
}
function cloadCart()
{
  
    var reviewSectionHtml = "<center><table border='1'><thead><th>Catalog#</th><th>Item</th><th>Price</th><th>Quantity</th><th>Total</th></thead>";
    var orderTotal = 0;
    if (sessionStorage.length > 0) {
       // reviewSectionHtml = "<center><table border='1'><thead><th>Catalog#</th><th>Item</th><th>Price</th><th>Quantity</th><th>Total</th></thead>";
        for (var i = 0; i < sessionStorage.length; i++) {
            var key = sessionStorage.key(i);
            var value = sessionStorage.getItem(key);
            var columnSplit = value.split(',');
            reviewSectionHtml += '<tr><td>' + columnSplit[0] + '</td><td>' + columnSplit[1] + "<p style='text-align:center'><img width='80' height='80' src=" + columnSplit[2] + " alt=''/></p></td><td>$" + columnSplit[3] + "</td><td>" + columnSplit[4] + "</td><td>$" + (columnSplit[3] * columnSplit[4]).toFixed(2) + "</td></tr>";
            orderTotal = (parseFloat(orderTotal) + parseFloat(columnSplit[3] * columnSplit[4])).toFixed(2)
        }
        reviewSectionHtml += "<tr><td colspan=4 id=totalrow> Total: </td><td>$" + orderTotal + "</td></tr> </table></center>";
    }
    else {
        alert("Empty Cart-Please Buy Something First");
     
    }
    var dynamicCart = document.getElementById("orderinformation");
    dynamicCart.innerHTML = reviewSectionHtml;
}
function validate()
{
    var creditcardnumber = document.getElementById("creditcardnumber").value;

    if (creditcardnumber.length != 16) 
    {
        alert("Its mandatory to enter a valid credit card number");

    }
    else {
        var sum = 0;

        for (var i = 0; i < creditcardnumber.length; i++) {
            var Digit = parseInt(creditcardnumber.charAt(i))
            if (i % 2 == 0)
            {
               Digit *= 2;
            }
            sum += Digit;
        }

        if ((sum % 10) == 0) {

        }
        else {
            alert("Please enter a Valid Credit Card number, Please check and try again");
        }
    }
}
function orderinfo()
{
	var reviewSectionHtml = "<h1>PURCHASED ITEM</h1>";
	var orderTotal= 0;
	var key = sessionStorage.key(0);
    var value = sessionStorage.getItem(key);
	var columnSplit = value.split(',');
reviewSectionHtml += "<p style='text-align:center'><img width='160' height='160' src=" + columnSplit[1] + " alt=''/></p>";
reviewSectionHtml +=  "<h2>" + key + "</h2>";
reviewSectionHtml +=  "<h3>Quantity:" + columnSplit[3] +"</h3>";
reviewSectionHtml +=  "<h3>Price:" + columnSplit[2] +"</h3>";
 orderTotal = (parseFloat(orderTotal) + parseFloat(columnSplit[2] * columnSplit[3])).toFixed(2)
reviewSectionHtml +=  "<h3>Total:" + orderTotal +"</h3>";

 var dynamicCart = document.getElementById("orderinformation1");
    dynamicCart.innerHTML = reviewSectionHtml;

	
	
}