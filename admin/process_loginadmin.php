<?php 
$email=$password="";
if(isset($_POST['email'])){
    $email=$_POST['email'];
}
if(isset($_POST['password'])){
    $password=$_POST['password'];
}
require 'connect.php';

$sql = "select * from admin
where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) == 1){
	$each = mysqli_fetch_array($result);
	session_start();
	$_SESSION['name'] = $each['name'];
	$_SESSION['level'] = $each['level'];

	header('location:root/index.php');
	exit;
}
header('location:index.php');