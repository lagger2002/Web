<?php
require 'connectdb.php';
$sql = "select * from products";
$result = mysqli_query($connect, $sql);


?>
<style type="text/css">
	   #giua{
                width: 100%;
                height: 70%;
                background:  white;
            }
    .tungsanpham
    {
        width: 30%;
		border: 2px solid black;
		height: 250px;
		float: left;
    }
</style>
<h1>flash sale </h1>
<div id="giua">
<?php foreach ($result as $each): ?>
		<div class="tung_san_pham">
			<h1>
				<?php echo $each['name'] ?>
			</h1>
			<img src="../picture/<?php echo $each['img'] ?>" alt="" height="100px" width="100px">
			<p><?php echo $each['price'] ?>$</p>
			<a href="product.php?id=<?php echo $each['id'] ?>">
				Xem chi tiết >>>
			</a>
			<?php if(!empty($_SESSION['id'])){ ?>
				<br>
				<a href="add_to_cart.php?id=<?php echo $each['id'] ?>">
					Thêm vào giỏ hàng
				</a>
			<?php } ?>
		</div>
	<?php endforeach ?>
</div>


