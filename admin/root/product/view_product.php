<?php
require_once('./db/connect.php');
$sql = "select * from products";
$result = mysqli_query($connect, $sql);
?>
<a href="./product/create.php" style="float: right; background-color: #e28585;" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Product</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên chó </th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Mô Tả</th>
                <th>Danh mục</th>
                <th>Xem</th>
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
                        <p style="display: -webkit-box;
                            max-height: 3.2rem;
                           -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: normal;
                            -webkit-line-clamp: 2;
                            line-height: 1.6rem;
                            margin-top: 10px;"><?php echo $value['name'] ?></p>
                    </td>
                    <td><img src="<?php echo $value['img'] ?>" alt="" style="width: 100px;"></td>
                    <td>
                        <p style="color: #820813;"><?php echo $value['price'] ?>đ</p>
                    </td>
                    <td>
                        <p><?php echo $value['detail'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $value['idcategory'] ?></p>
                    </td>
                    <td>
                        <a href="./product/read.php?id=<?php echo $value['id'] ?>"><span class="fa fa-eye" style="color: #e28585;"></span></a>
                    </td>
                    <td>
                        <a href="./product/update.php?id=<?php echo $value['id'] ?>"><span class="fa fa-pencil" style="color: #e28585;"></a>
                    </td>
                    <td>
                        <a href="./product/delete.php?id=<?php echo $value['id'] ?>"><span class="fa fa-trash" style="color: #e28585;"></span></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>