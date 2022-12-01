<?php
require_once('./db/connect.php');
$sql = "select * from lien_he";
$result = mysqli_query($connect, $sql);
?>
<!-- <a href="../../../admin/root/orders/create_order.php" style="float: right; background-color: #e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a> -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>ho_ten</th>
                <th>dia_chi</th>
                <th>email</th>
                <th>so_dien_thoai</th>
                <th>noi_dung</th>
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
                        <p><?php echo $value['ho_ten'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['dia_chi'] ?></p>
                    </td>
                    <td><?php echo $value['email'] ?></td>
                    <td>
                        <p><?php echo $value['so_dien_thoai'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['noi_dung'] ?>đ</p>
                    </td>
                    <!-- <td>
                        <a href="../../../admin/root/orders/read_orders.php?id=<?php echo $value['id'] ?>"><span class="fa fa-eye"></span></a>
                    </td> -->
                    <!-- <td>
                        <a href="../../../admin/root/orders/update_order.php?id=<?php echo $value['id'] ?>"><span class="fa fa-pencil" style="color: #e28585;"></a>
                    </td>-->
                    <td>
                        <a href="../../../admin/root/contact/delete_contact.php?id=<?php echo $value['id'] ?>"><span class="fa fa-trash" style="color: #e28585;"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>