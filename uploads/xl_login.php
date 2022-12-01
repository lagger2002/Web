<?php
$username = $_POST['username'];
$password = $_POST['password'];


require 'connectdb.php';
$sql = "select * from guest where name = '$username' and password = '$password' ";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if($number_rows==1)
{
    session_start();
    $each = mysqli_fetch_array($result);
    $_SESSION['id'] = $each['id'];
    $_SESSION['username'] = $each['username'];
    
    header('location: index.php');
    
}else
{
    echo "Đăng nhập sai";
     
}
