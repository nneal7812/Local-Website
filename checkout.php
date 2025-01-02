<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #b9ffff;
            text-align: center;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>
</html>
<?php
//current and newly added data based on db and previous user entry
$id = $_POST['id'];
$bookName = $_POST['bookName'];
$description = $_POST['description'];
$image = $_POST['image'];
$price = $_POST['price'];
$currentQuantity = $_POST['currentQuantity'];
$userQuantity = $_POST['quantity'];
$total;

//user entered data
$firstName;
$lastName;
$email;
$address1;
$address2;
$city;
$state;
$zip;
$country;
$phone;
$fax;
$mail_list;
$ccNo;
$expMo;
$expYr;

$newQuantity = $currentQuantity - $userQuantity;
$total = $price * $userQuantity;

//displays checkout information
print("<form action='processForm.php' method='post'>");

print("<h1 align='center'>Enter Customer Info Below</h1>");
print("First Name <input type='text' maxlength='10' name='first name' size='50' required='required' pattern='[A-Za-z\s]+' /><br /><br />
");
print("Last Name <input type ='text' maxlength='10' name='last name' size='50' required='required' pattern='[A-Za-z\s\']+' /><br /><br />
");
print("Email <input type='text' maxlength='40' name='email' size='50' required='required' pattern='[A-Za-z]+@[A-Za-z]+.[A-Za-z]+' /><br /><br />
");
print("Address 1 <input type='text' maxlength='30' name='address_1' size='50' required='required' pattern='[A-Za-z0-9\s-.]' /><br /><br />
");
print("Address 2 <input type='text' maxlength='30' name='address_2' size='50' /><br /><br />
");
print("City <input type='text' maxlength='20' name='city' size='50' required='required' pattern='[A-Za-z\s]+' /><br /><br />
");
print("State <input type='text' maxlength='2' name='state' size='5' required='required' pattern='[A-Za-z]{2}'/><br /><br />
");
print("ZIP <input type='text' maxlength='5' name='zip' size='8' required='required' pattern='[0-9]{5}'/><br /><br />
");
print("Phone <input type='text' maxlength='14' name='phone' size='50' required='required' pattern='(\()?[0-9]{3}(\))?(-)?[0-9]{3}(-)?[0-9]{4}' /><br /><br />
");
print("Fax <input type='text' maxlength='30' name='fax' size='50' pattern='((\()?[0-9]{3}(\))?(-)?[0-9]{3}(-)?[0-9]{4})' /><br /><br />
");
print("<input type='checkbox' name='check' value='1' />Check here to be added to the mailing list<br /><br />
");

//adds in new content from database
print("<h1 class='bold'>Purchased Item</h1></br>");
print("<img src='$image'/>");
print("<h1>$bookName</h1>");
print("<h4>Quantity: $userQuantity</h4>");
print("<h4>Price: $price</h4>");
print("<h4>Total: $total</h4></br>");

print("<h2>Enter Credit Card Information Below</h2><br />");
print("<input type='radio' name='radio' value='MC' required='required' /><img src='checkout/mc.jpg' width='25'/>Master Card<br />
");
print("<input type='radio' name='radio' value='Visa' /><img src='checkout/visa.jpg' width='25'/>Visa<br />
");
print("<input type='radio' name='radio' value='AE' /><img src='checkout/amex.jpg' width='25'/>American Express<br />
");
print("<input type='radio' name='radio' value='Discover' /><img src='checkout/discover.jpg' width='25'/>Discover<br /><br />
");
print("<h3>Enter Card Number and Expiration</h3>");
print("Credit Card Number <input type='text' maxlength='16' name='cardNum' size='25' required='required' pattern='[0-9]{16}' /><br /><br />
");
print("Expiration Month <select maxlength='5' name='expMonth' required='required' pattern='[0-9]{2}(\/)[0-9]{2}' />
");

for($i = 1; $i <= 12; $i++){
    print("<option>$i</option>");
}

print("</select><br />");
print("Expiration Year <select name='expYear'>");

for($i = 2026; $i <= 2035; $i++){
    print("<option>$i</option>");
}

print("</select><br />");

print("<input type='submit' value='Buy Now!' name='submit_button' />");
print("<input type='reset' value='Reset' name='reset_button'  /><br /><br /><br />");

print("<input type='hidden' name='id' value='$id'>");
print("<input type='hidden' name='bookName' value='$bookName'>");
print("<input type='hidden' name='description' value='$description'>");
print("<input type='hidden' name='image' value='$image'>");
print("<input type='hidden' name='price' value='$price'>");
print("<input type='hidden' name='userQuantity' value='$userQuantity'>");
print("<input type='hidden' name='newQuantity' value='$newQuantity'>");
print("<input type='hidden' name='total' value='$total'");

print("<a href='store_index.html'>Return to Previous Page</a>");
print("</form>");
?>
