<?php

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

$id = $_POST['id'];
$bookName = $_POST['bookName'];
$description = $_POST['description'];
$image = $_POST['image'];
$price = $_POST['price'];
$userQuantity = $_POST['userQuantity'];
$newQuantity = $_POST['newQuantity'];
$total = $_POST['total'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$address1 = $_POST['address_1'];
$address2 = $_POST['address_2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$mailList = isset($_POST['check']) ? $_POST['check'] : 0;
$cardType = $_POST['radio'];
$ccNo = $_POST['cardNum'];
$expMo = $_POST['expMonth'];
$expYr = $_POST['expYear'];
$date = new DateTime('now');
$currentDate = $date->format('Y-m-d');

$data = openDB();

try {
    $query = "INSERT into Customer values('$ccNo', '$expMo', '$expYr', '$firstName',
'$lastName', '$email', '$address1', '$address2', '$city', '$state', '$zip', 'United States',
'$phone', '$fax', '$mailList')";


    $res = mysqli_query($data, $query);
} catch (Exception $e) {
    mysqli_close($data);
}

//use this new quantity to check for if the buy now button should be
//present in the processProduct page
try {
    $query = "INSERT into Orders1 values('$ccNo', '$id', '$userQuantity', '$currentDate')";

    $res = mysqli_query($data, $query);
} catch (Exception $e) {
    mysqli_close($data);
}

try {
    $query = "UPDATE Product SET inventory='$newQuantity' WHERE item_no='$id'";

    $res = mysqli_query($data, $query);
} catch (Exception $e) {
    mysqli_close($data);
}

mysqli_close($data);

header('Location: store_index.html');