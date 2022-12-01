<?php
// Include config file
require_once "../db/config.php";
// Define variables and initialize with empty values
$name = $img = $price = $detail = $idcategory = "";
$name_err = $img_err = $price_err = $detiail_err = $idcategory_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate title
    // $input_ten_san = trim($_POST["ten_san"]);
    // if (empty($input_title)) {
    //     $ten_san_err = "Please enter a title.";
    // } elseif (!filter_var($input_ten_san, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
    //     $ten_san_err = "Please enter a valid ten_san.";
    // } else {
    //     $ten_san = $input_ten_san;
    // }

    // Validate mo_ta
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter an name.";
    } else {
        $name = $input_name;
    }

    // Validate mo_ta
    $input_img = trim($_POST["img"]);
    if (empty($input_img)) {
        $img_err = "Please enter an img.";
    } else {
        $img = $input_img;
    }

    // Validate anh
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price amount.";
    } else {
        $price = $input_price;
    }

    // Validate gia
    $input_detail = trim($_POST["detail"]);
    if (empty($input_detail)) {
        $price_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_gia)) {
        $detail_err = "Please enter a positive integer value.";
    } else {
        $detail = $input_detail;
    }

    // Validate danh_muc
    $input_idcategory = trim($_POST["idcategory"]);
    if (empty($input_idcategory)) {
        $idcategory_err = "Please enter the price amount.";
    } elseif (!ctype_digit($input_idcategory)) {
        $idcategory_err = "Please enter a positive integer value.";
    } else {
        $idcategory = $input_idcategory;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($img_err) && empty($price_err) && empty($detail_err) && empty($idcategory_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO products (name, img, price, detail, idcategory) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_img, $param_price, $param_detail, $param_idcategory);

            // Set parameters
            $param_name = $name;
            $param_img = $img;
            $param_price = $price;
            $param_detail = $detail;
            $param_idcategory = $idcategory;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: ../productTable.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" title="title" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>img</label>
                            <textarea title="thumbnail" name="img" class="form-control <?php echo (!empty($img_err)) ? 'is-invalid' : ''; ?>"><?php echo $img; ?></textarea>
                            <span class="invalid-feedback"><?php echo $img_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>price </label>
                            <input type="text" title="content" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                            <span class="invalid-feedback"><?php echo $anh_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>detail </label>
                            <input type="text" title="price" name="detail" class="form-control <?php echo (!empty($detail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $detail; ?>">
                            <span class="invalid-feedback"><?php echo $gia_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>idcategory</label>
                            <input type="text" title="price" name="idcategory" class="form-control <?php echo (!empty($idcategory_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $idcategory; ?>">
                            <span class="invalid-feedback"><?php echo $danh_muc_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../productTable.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>able.