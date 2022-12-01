<?php
require_once('./db/connect.php');
$sql = "select * from invoice_detail";
$result = mysqli_query($connect, $sql);
?>
<!-- <a href="../../../admin/root/orderDetail/create_order_Detail.php" style="float: right; background-color: #e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a> -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>order_id</th>
                <th>product_id </th>
                <th>quantity</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
                <tr>>
                    <td>
                        <p><?php echo $value['order_id'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['product_id'] ?></p>
                    </td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td>
                        <a href="./orderDetail/delete_order_detail.php?id=<?php echo $value['order_id'] ?>"><span class="fa fa-trash" style="color: #e28585;"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>