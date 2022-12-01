<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>
<body>
<?php 
session_start();
$cart = $_SESSION['cart'];
?>


<table>
    <tr>
        <td>ảnh </td>
        <td>Tên sản phẩm</td>
        <td>Giá </td>
        <td>Số lượng</td>
        <td>Tổng tiền </td>
        <td>Xóa</td>
    </tr>
</table>

</body>
</html>