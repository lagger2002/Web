<?php

use function PHPSTORM_META\map;

include '../admin/head.php';
require 'connectdb.php';
$cart = $_SESSION['cart'];
$sum = 0;
?>



<table border="1px">

<tr>

<td>Ảnh</td>
<td>Tên sản phẩm</td>
<td>Giá</td>
<td>Số lượng</td>
<td>Tổng tiền </td>
<td>Xóa</td>

</tr>

<?php if(is_array($cart) || is_object($cart))
foreach ($cart as $id => $each): ?>
    
 
    <tr>
        <td>
            <img src="../picture/<?php echo $each['img'] ?>" alt="" height="100px" width="100px">
        </td>
        <td><?php echo $each['name'] ?></td>
        <td><?php echo $each['price'] ?></td>
        <td>
        <a href="slproduct.php?id=<?php echo $id ?>&type=decre">
					-
				</a>
				<?php echo $each['quantity'] ?>
				<a href="slproduct.php?id=<?php echo $id ?>&type=incre">
					+
				</a>
        </td>
        <td>
            

            <?php 

                $result = $each['price']  *$each['quantity'];
                $sum += $result;
            echo $result ?> 
        </td>
        <td>
				<a href="delete_prd_cart.php?id=<?php echo $id ?>">
					X
				</a>
			</td>
    </tr>
    
<?php endforeach ?>


</table>

<h1>
    Tổng tiền hóa đơn: 
    <?php echo $sum ?> VNĐ
</h1>

<form action="checkout.php" method="POST">
    <h2>THông tin người mua</h2>
    Tên người mua<input type="text " name="name_recei">
    <br>
   Số điện thoại <input type="text " name="phone_receiv">
    <br>
    Địa chỉ <input type="text" name="address_receiv">
    <br>
    <button type="submit" name="submit">Đặt hàng</button>
</form>

<?php 
 include '../admin/footer.php';
 ?>
