<?php
require 'connectdb.php';
$name_recei = $_POST['name_recei'];
$phone_receiv = $_POST['phone_receiv'];
$address_receiv = $_POST['address_receiv'];

session_start();
$cart = $_SESSION['cart'];

$sum_price = 0;
foreach($cart as $each)
{
    $sum_price += $each['price']  *$each['quantity'];
}
$gues_id = $_SESSION['gues_id'];
$status = 0;



$sql = "insert into order(gues_id, name_receiv,phone_receiv, address_receive, status, date_time, sum_pri)  values ('$gues_id', '$ame_receiv', '$phone_receiv', '$address_receive', '$status', '$date_time', '$sum_price    ' )";
mysqli_query($connect,$sql);
$sql = "select max(id) from order where gues_id = '$gues_id'";

$result = mysqli_query($connect, $sql);
$order_id = mysqli_fetch_array($result)['max(id)'];
foreach($cart as $product_id => $each)
{
$quantity = $each['quantity'];
$sql = "insert into invoice_details(order_id , product_id , quantity) values ('$order_id','$product_id','$quantity')";
mysqli_query($connect, $sql);

}

mysqli_close($connect);
unset($_SESSION['cart']);
header("location: cart.php");

