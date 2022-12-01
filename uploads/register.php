<?php
include 'connectdb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap');
 * {box-sizing: border-box}
 body{
   font-family: 'Noto Sans JP', sans-serif;
 }
 h1, label{
   color: DodgerBlue;
 }
   input[type=text], input[type=password] {
   width: 100%;
   padding: 15px;
   margin: 5px 0 22px 0;
   display: inline-block;
   border: none;
   width:100%;
   resize: vertical;
   padding:15px;
   border-radius:15px;
   border:0;
   box-shadow:4px 4px 10px rgba(0,0,0,0.2);
 }
input[type=text]:focus, input[type=password]:focus {
   outline: none;
 }
hr {
   border: 1px solid #f1f1f1;
   margin-bottom: 25px;
 }
button {
   background-color: #4CAF50;
   color: white;
   padding: 14px 20px;
   margin: 8px 0;
   border: none;
   cursor: pointer;
   width: 100%;
   opacity: 0.9;
 }
button:hover {
   opacity:1;
 }
.cancelbtn {
   padding: 14px 20px;
   background-color: #f44336;
 }
.signupbtn {
   float: left;
   width: 100%;
   border-radius:15px;
   border:0;
   box-shadow:4px 4px 10px rgba(0,0,0,0.2);
 }
.container {
   padding: 16px;
 }
.clearfix::after {
   content: "";
   clear: both;
   display: table;
 }
    </style>
    <title>Đăng kí </title>
</head>
<body>
    <h1>Đăng kí</h1>
    <!-- <form action="xl_register.php" method="POST">
    <br>user name <br>
        <input type="text" name="username" id="">
         <br>email <br>
        <input type="text" name="email" id="">
        <br>password <br>
        <input type="password" name="password" id="">
        <br>Phone <br>
        <input type="text" name="phone" id="">
        <br>address <br>
        <input type="text" name="address" id="">
        
        <button type="submit" name="submit">Đăng kí </button>
    </form> -->
    <form action="xl_register.php" method="POST">
   <div class="container">
     <p>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p>
     <hr>
     <label for="email"><b>User name</b></label>
     <input type="text" placeholder="name" name="username" required>
    <label for="email"><b>Email</b></label>
     <input type="text" placeholder="Nhập Email" name="email" required>
    <label for="psw"><b>Mật Khẩu</b></label>
     <input type="password" placeholder="Nhập Mật Khẩu" name="password" required>
    <label for="psw-repeat"><b>Phone</b></label>
     <input type="text" placeholder="Phone number" name="phone" required>
     <label for="psw-repeat"><b>Address</b></label>
     <input type="text" placeholder="Address" name="Address" required>
    <div class="clearfix">
       <button type="submit" class="signupbtn" name="submit">Sign Up</button>
    <label for="">Bạn đã có tài khoản? 
        <a href="login.php">Đăng nhập</a>
    </label>
     </div>
   </div>
 </form>
</body>
</html>









