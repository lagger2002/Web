<?php
// Include config file
require_once "../db/config.php";

// Define variables and initialize with empty values
$name = $img = $price = $detail = $idcategory = "";
$name_err = $img_err = $price_err = $detiail_err = $idcategory_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate title
    // $input_title = trim($_POST["title"]);
    // if (empty($input_title)) {
    //     $title_err = "Please enter a title.";
    // } elseif (!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
    //     $title_err = "Please enter a valid title.";
    // } else {
    //     $title = $input_title;
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
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM products WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $param_name = $name;
                     $param_img = $img;
                     $param_price = $price;
                     $param_detail = $detail;
                     $param_idcategory = $idcategory;
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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

                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../productTable.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>