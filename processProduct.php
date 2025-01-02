<!DOCTYPE html>
<html>
<head>
    <body>
        <style>
            body {
                background-color: #b9ffff;
                text-align: center;
            }

            h2 {
                font-size: 24px;
                color: brown;
                font-style: italic;
            }

            h4 {
                font-style: italic;
            }

        </style>
        <script>
            //checks for if user is able to purchase the current quantity of books
            function checkQuantity(currentQuantity) {
                var userInput = parseInt(document.getElementById('quantity').value);
                var submitButton = document.getElementById('submit');

                if (userInput > 0 && userInput <= currentQuantity) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                    alert("You Entered a Quantity That is Not Possible. There are only " + currentQuantity + " Left");
                }
            }
        </script>

    </body>
</head>
</html>

<?php

$id = $_GET["id_no"];
$array = array("ebook_name", "description", "image", "price", "inventory");
$resultArray = array();
function openDB()
{
    try {
        $db = mysqli_connect("localhost:3306", "student", "hello");
        $res = mysqli_select_db($db, "student_space");
    } catch (mysqli_sql_exception $e) {
        exit($e->getMessage() . " " . $e->getCode() . " " . $e->getTraceAsString());
    }

    return ($db);
}


$data = openDB();

for ($i = 0; $i < 5; $i++) {
    try {
        $query = "SELECT $array[$i] FROM Product WHERE item_no = '$id'";
        $res = mysqli_query($data, $query);
        $resultArray[$i] = mysqli_fetch_row($res);
    } catch (mysqli_sql_exception $e) {
        mysqli_close($data);
        return (-1);
    }
}

$bookName = $resultArray[0][0];
$description = $resultArray[1][0];
$image = $resultArray[2][0];
$price = $resultArray[3][0];
$currentQuantity = $resultArray[4][0];
$pattern = "[1-" . $currentQuantity . "]";

print("<form action='checkout.php' method='POST'>");
print("<h1>$bookName</h1></br>");
print("<img src = $image></br>");
print("<h2>$description</h2>");
print("<h4>Price: $price</h4>");
print("<h4>Quantity: <input type='text' id='quantity' maxlength='2' size='4' name='quantity' required='required' oninput='checkQuantity($currentQuantity)' /></h4><br /><br />");

print("<input type='hidden' name='id' value='$id'>");
print("<input type='hidden' name='bookName' value='$bookName'>");
print("<input type='hidden' name='description' value='$description'>");
print("<input type='hidden' name='image' value='$image'>");
print("<input type='hidden' name='price' value='$price'>");
print("<input type='hidden' name='currentQuantity' value='$currentQuantity'>");

if ($currentQuantity > 0) {
    print("<button type='submit' id='submit' disabled><img src='BuyNow.png' alt='Buy Now'></button>");
} else{
    print("<h1>Sold Out</h1>");
}

print("</br></br><a href='store_index.html'>Continue Shopping</a><br /><br />");
print("</form>");

mysqli_close($data);