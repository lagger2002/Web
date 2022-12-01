<?php
require_once('./db/connect.php');
$sql = "select * from users";
$result = mysqli_query($connect, $sql);
?>
<a href="../../../admin/root/users/create_register.php" style="float: right; background-color: #e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>email </th>
                <th>phone_number</th>
                <th>address</th>
                <th>password</th>
                <th>token</th>
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
                        <p><?php echo $value['name'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['email'] ?></p>
                    </td>
                    <td>
                        <?php echo $value['phone_number'] ?>
                    </td>
                    <td>
                        <p><?php echo $value['address'] ?>đ</p>
                    </td>
                    <td>
                        <p><?php echo $value['password'] ?>đ</p>
                    </td>
                    <td>
                        <p><?php echo $value['token'] ?>đ</p>
                    </td>
                    <!-- <td>
                        <a href="../../../admin/root/orders/read_orders.php?id=<?php echo $value['id'] ?>"><span class="fa fa-eye"></span></a>
                    </td> -->
                    <td>
                        <a href="../../../admin/root/users/update_register.php?id=<?php echo $value['id'] ?>"><span class="fa fa-pencil" style="color: #e28585;"></a>
                    </td>
                    <td>
                        <a href="../../../admin/root/users/delete_register.php?id=<?php echo $value['id'] ?>"><span class="fa fa-trash" style="color: #e28585;"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>