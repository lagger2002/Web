<?php
require_once('./db/connect.php');
$sql = "select * from order";
$result = mysqli_query($connect, $sql);
?>
<!-- <a href="../../../admin/root/orders/create_order.php" style="float: right; background-color: #e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a> -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>guest_id</th>
                <th>name_receiv</th>
                <th>phone_receiv</th>
                <th>address_receiv</th>
                <th>status</th>
                <th>date_time</th>
                <th>sum_pri</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($result) || is_object($result)) foreach ($result as $value) : ?>
                <tr>
                    <td>
                        <p><?php echo $value['id'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['guest_id'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['name_receiv'] ?></p>
                    </td>
                    <td><?php echo $value['phone_receiv'] ?></td>
                    <td>
                        <p><?php echo $value['address_receiv'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['status'] ?>đ</p>
                    </td>
                    <td>
                        <p><?php echo $value['date_time'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['sum_pri'] ?></p>
                    </td>
                    <!-- <td>
                        <a href="../../../admin/root/orders/read_orders.php?id=<?php echo $value['id'] ?>"><span class="fa fa-eye"></span></a>
                    </td> -->
                    <td>
                        <a href="./orders/update_order.php?id=<?php echo $value['id'] ?>"><span class="fa fa-pencil" style="color: #e28585;"></a>
                    </td>
                    <td>
                        <a href="./orders/delete_order.php?id=<?php echo $value['id'] ?>"><span class="fa fa-trash" style="color: #e28585;"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>