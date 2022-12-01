<?php
require 'connectdb.php';
// $username= $_POST['username'];
// $email= $_POST['email'];
// $password= $_POST['password'];
    $err=[];
if(isset($_POST['submit'])){
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    if (empty($name)) {
        array_push($errors, "Username is required"); 
        }
    if (empty($email)) {
        array_push($errors, "Email is required"); 
        }
   
    if (empty($password)) {
        array_push($errors, "Two password do not match"); 
        }
    // $sql = "SELECT * FROM acount WHERE username = '$username' OR email = '$email'";
    // $result = mysqli_query($conn, $sql);   
    // if (mysqli_num_rows($result) > 0)
    //     {
    //     echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

    // // Dừng chương trình
    // die ();
    //     }
        // else {
        //     $sql = "INSERT INTO acount (username, email,password) VALUES ('$username','$email','$password')";
        // echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="register.php";</script>';
        // if($result)
        // {
        //     header('location: login.php');
        // }
        // die ();
            
        // }
    if(empty($err))
    {
     //   $password= password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO guest (name, email,password, phone, address) VALUES ('$name','$email','$password', '$phone', '$address')";
        $result = mysqli_query($connect, $sql);   
        if($result)
        {
            header('location: login.php');
        }
        else
        {
            echo "lỗi rồi";
        }
    }

}
    